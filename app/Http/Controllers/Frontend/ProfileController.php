<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Exception;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
            }
            
            return view('frontend.profile.profil', [
                'user' => $user
            ]);
        } catch (Exception $e) {
            Log::error('Error loading profile page: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Terjadi kesalahan saat memuat halaman profil.');
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
            }

            // Validasi input dengan aturan yang lebih ketat
            $validated = $request->validate([
                'name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
                'email' => [
                    'required', 
                    'string', 
                    'email:rfc,dns', 
                    'max:255', 
                    Rule::unique('users')->ignore($user->id)
                ],
                'phone' => [
                    'nullable', 
                    'string', 
                    'min:10', 
                    'max:15', 
                    'regex:/^[0-9+\-\s()]+$/'
                ],
                'address' => ['nullable', 'string', 'min:5', 'max:500'],
                'current_password' => ['nullable', 'required_with:password', 'string'],
                'password' => ['nullable', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            ], [
                'name.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
                'name.min' => 'Nama minimal 2 karakter.',
                'email.email' => 'Format email tidak valid.',
                'phone.regex' => 'Format nomor telepon tidak valid.',
                'phone.min' => 'Nomor telepon minimal 10 digit.',
                'address.min' => 'Alamat minimal 5 karakter.',
                'password.regex' => 'Password harus mengandung minimal 1 huruf kecil, 1 huruf besar, dan 1 angka.',
                'current_password.required_with' => 'Password saat ini wajib diisi jika ingin mengubah password.',
            ]);

            // Verify current password if user wants to change password
            if ($request->filled('current_password')) {
                if (!Hash::check($request->current_password, $user->password)) {
                    return back()->withErrors([
                        'current_password' => 'Password saat ini tidak sesuai.'
                    ])->withInput($request->except(['current_password', 'password', 'password_confirmation']));
                }
            }

            // Sanitasi input
            $validated['name'] = trim($validated['name']);
            $validated['email'] = strtolower(trim($validated['email']));
            if ($validated['phone']) {
                $validated['phone'] = preg_replace('/[^0-9+]/', '', $validated['phone']);
            }
            if ($validated['address']) {
                $validated['address'] = trim($validated['address']);
            }

            // Update user data menggunakan database transaction
            DB::beginTransaction();
            
            try {
                // Update basic information
                $user->name = $validated['name'];
                $user->email = $validated['email'];
                $user->phone = $validated['phone'];
                $user->address = $validated['address'];
                
                // Update password if provided
                if ($request->filled('password')) {
                    $user->password = Hash::make($validated['password']);
                }
                
                // Save changes
                $user->save();
                
                DB::commit();
                
                Log::info('User profile updated successfully', ['user_id' => $user->id]);
                
                return back()->with('success', 'Profil berhasil diperbarui!');
                
            } catch (Exception $e) {
                DB::rollBack();
                Log::error('Error updating user profile: ' . $e->getMessage(), ['user_id' => $user->id]);
                throw $e;
            }
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput($request->except(['current_password', 'password', 'password_confirmation']));
        } catch (Exception $e) {
            Log::error('Unexpected error in profile update: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui profil. Silakan coba lagi.')->withInput($request->except(['current_password', 'password', 'password_confirmation']));
        }
    }
}