<div class="top">
    <i class="uil uil-bars sidebar-toggle"></i>
        <div class="search-box">
            {{-- <i class="uil uil-search"></i>
            <input type="text" placeholder="Search here..."> --}}
        </div>
        <div class="dropdown" style="border: 0px solid black">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/img/boy.png" alt="">
                <span class="user-name">{{ auth()->user()->nama }}</span>
            </button>
            <ul class="dropdown-menu">
                {{-- <li><a class="dropdown-item" href="#">Profile</a></li> --}}
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>                                                            
        </div>
    
</div>
