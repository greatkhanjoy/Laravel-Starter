      <div class="navigation">
        <ul>
          <li>
            <a href="">
              <span class="icon"
                ><ion-icon name="flower-outline"></ion-icon
              ></span>
              <span class="title">ADMIN PANEL</span>
            </a>
          </li>
          <li class="@if (request()->routeIs('admin.index')) active @endif">
            <a href="{{route('admin.index')}}">
              <span class="icon"
                ><ion-icon name="home-outline"></ion-icon
              ></span>
              <span class="title">Dashboard</span>
            </a>
          </li>
          <li class="@if (request()->routeIs('admin.user.index') || request()->routeIs('admin.user.create') || request()->routeIs('admin.user.edit')) active @endif">
            <a href="{{route('admin.user.index')}}">
              <span class="icon"
                ><ion-icon name="people-outline"></ion-icon
              ></span>
              <span class="title">Users</span>
            </a>
          </li>
          <li class="@if (request()->routeIs('admin.role.index') || request()->routeIs('admin.role.create') || request()->routeIs('admin.role.edit')) active @endif" >
            <a href="{{route('admin.role.index')}}">
              <span class="icon"
                ><ion-icon name="finger-print"></ion-icon></span>
              <span class="title">Roles</span>
            </a>
          </li>
          <li class="@if (request()->routeIs('admin.permission.index') || request()->routeIs('admin.permission.create') || request()->routeIs('admin.permission.edit')) active @endif" >
            <a href="{{route('admin.permission.index')}}">
              <span class="icon"
                ><ion-icon name="key"></ion-icon></span>
              <span class="title">Permissions</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="icon"
                ><ion-icon name="chatbubbles-outline"></ion-icon
              ></span>
              <span class="title">Messages</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="icon"
                ><ion-icon name="help-circle-outline"></ion-icon
              ></span>
              <span class="title">Help</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="icon"
                ><ion-icon name="settings-outline"></ion-icon
              ></span>
              <span class="title">Settings</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="icon"
                ><ion-icon name="help-circle-outline"></ion-icon
              ></span>
              <span class="title">Password</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="icon"
                ><ion-icon name="log-out-outline"></ion-icon
              ></span>
              <span class="title">Logout</span>
            </a>
          </li>
        </ul>
      </div>