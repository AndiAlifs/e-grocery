<!-- Page Heading -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 d-flex justify-content-evenly">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('cart') }}">Cart</a>
        <a href="{{ route('profile') }}">Profile</a>
        @if (strtolower(Auth::user()->role->role_name) == 'admin')
            <a href="{{ route('account_maintenance') }}">Account Maintenance</a>
        @endif
    </div>
</header>
