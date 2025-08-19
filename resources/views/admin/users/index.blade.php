<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-2 rounded-lg shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                Manajemen Pengguna
            </h1>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-300 hover:scale-105">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Pengguna</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $users->total() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-300 hover:scale-105">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Admin</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $users->where('role', 'admin')->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-300 hover:scale-105">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">User</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $users->where('role', 'user')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Table Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden backdrop-blur-sm">
                <div class="px-8 py-6 bg-gradient-to-r from-white to-gray-50 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">Daftar Pengguna</h2>
                            <p class="mt-1 text-sm text-gray-600">Kelola semua pengguna yang terdaftar di sistem</p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $users->total() }} Pengguna
                            </span>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <span>Nama</span>
                                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <span>Email</span>
                                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Role</th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Bergabung</th>
                                <th scope="col" class="relative px-8 py-4">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($users as $user)
                                <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center shadow-md">
                                                    <span class="text-sm font-semibold text-white">
                                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900 group-hover:text-blue-900 transition-colors duration-200">
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                            </svg>
                                            <span class="text-sm text-gray-600 group-hover:text-gray-800 transition-colors duration-200">
                                                {{ $user->email }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold shadow-sm transition-all duration-200 {{ $user->role === 'admin' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 group-hover:shadow-md' : 'bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 group-hover:shadow-md' }}">
                                            @if($user->role === 'admin')
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            @endif
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center text-sm text-gray-600 group-hover:text-gray-800 transition-colors duration-200">
                                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0h6m-6 0a1 1 0 00-1 1v8a1 1 0 001 1h6a1 1 0 001-1V8a1 1 0 00-1-1m-6 0V7"></path>
                                            </svg>
                                            <span class="font-medium">{{ $user->created_at->format('d M Y') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap text-right text-sm font-medium">
                                        @if(Auth::id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus pengguna ini? Pesanan dan data terkait pengguna ini juga akan terhapus.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-red-600 bg-red-50 hover:bg-red-100 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:scale-105 group">
                                                <svg class="w-4 h-4 mr-1 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                        @else
                                        <span class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-lg text-gray-400 bg-gray-100">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                            Anda
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Pengguna</h3>
                                            <p class="text-sm text-gray-500 max-w-sm">Belum ada pengguna yang terdaftar dalam sistem. Pengguna baru akan muncul di sini setelah registrasi.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Section -->
                @if($users->hasPages())
                <div class="bg-gradient-to-r from-gray-50 to-white px-8 py-6 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center text-sm text-gray-600 mb-4 sm:mb-0">
                            <span class="font-medium">Menampilkan {{ $users->firstItem() }}-{{ $users->lastItem() }} dari {{ $users->total() }} pengguna</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            {{ $users->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }
        
        /* Custom scrollbar */
        .overflow-x-auto::-webkit-scrollbar {
            height: 6px;
        }
        
        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        
        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        
        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</x-admin-layout>