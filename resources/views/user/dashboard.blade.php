<div class="container">
    <h1>Welcome to {{ session('admin_logged_in') ? 'Admin' : 'User' }} Dashboard</h1>
    <form action="{{ route('logout') }}" method="POST">@csrf <button type="submit">Logout</button></form>

</div>
