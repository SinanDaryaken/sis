<template>
    <div class="navbar-custom topnav-navbar topnav-navbar-dark">
        <div class="container-fluid">
            <a href="/" class="topnav-logo">
                <span class="topnav-logo-lg text-white">
                    Student Information System
                </span>
                <span class="topnav-logo-sm text-white">
                    SIS
                </span>
            </a>
            <ul class="list-unstyled topbar-menu float-end mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                       id="topbar-userdrop" href="javascript:void(0);" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span class="account-user-avatar rounded-circle img-thumbnail">
                        </span>
                        <span>
                            <span class="account-user-name">SIS</span>
                        </span>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                        aria-labelledby="topbar-userdrop">
                        <router-link :to="{name: 'profile'}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Profile</span>
                        </router-link>
                        <a href="javascript:void(0);" class="dropdown-item notify-item" @click="logout">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
export default {
    name: "Header",
    methods: {
        logout() {
            axios.post('/logout')
                .then(() => {
                    this.$router.push('/login');
                    location.reload();
                })
                .catch(error => this.$root.errorHandler(error));
        }
    }
}
</script>
