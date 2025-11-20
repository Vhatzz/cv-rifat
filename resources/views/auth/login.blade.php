<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <i class="bi bi-person-badge text-cyan-500 text-4xl mb-4"></i>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Admin Login</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Access your admin panel</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required 
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition"
                    placeholder="Enter your username">
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                <input type="password" name="password" required 
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition"
                    placeholder="Enter your password">
            </div>

            <button type="submit" 
                class="w-full bg-cyan-500 hover:bg-cyan-600 text-white py-3 px-4 rounded-lg font-medium transition duration-200">
                <i class="bi bi-box-arrow-in-right mr-2"></i>Sign In
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Access restricted to authorized personnel only
            </p>
        </div>
    </div>
</body>
</html>