<template>
    <div class="container-fluid bg-primary">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                                <a class="navbar-brand" href="#">Navbar</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto">
                                        <NavLink class="nav-link" :active="$page.component == 'Home'" href="/">Home</NavLink>
                                        <li class="nav-item">
                                            <NavLink class="nav-link" :active="$page.component == 'Users'" href="users">Users</NavLink>
                                        </li>
                                        <li class="nav-item">
                                            <NavLink class="nav-link" :active="$page.component == 'Setting'" href="setting">Setting</NavLink>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import NavLink from "@/Pages/Profile/NavLink";
    export default {
        name: "Nav",
        components: {NavLink},
    }
</script>

<style scoped>

</style>
