<div class="top-bar">
    <h2>RENTIFY</h2>
    <input type="text" placeholder="Search...">
    <div class="admin-section">
        <span><?php if(session()->get('authenticatedUser') != null) echo session()->get('authenticatedUser')->getUserName(); else echo"test";?></span>
        <img src="https://img.icons8.com/?size=100&id=vB3C82RDvwwa&format=png&color=000000" alt="Admin">
    </div>
</div>