<template>
    <div class="container-fluid m-0 p-0">
        <div class=" mb-3">
            <b-navbar toggleable="lg" type="dark" variant="primary">
                <b-navbar-brand href="#">ESKIMI SSP</b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                <b-collapse id="nav-collapse" is-nav>
                    <b-navbar-nav>
                        <router-link to="/" class="nav-item nav-link">Advert List</router-link>
                        <router-link to="/create" class="nav-item nav-link">Create Advert</router-link>
                    </b-navbar-nav>
                </b-collapse>
            </b-navbar>
        </div>
        <div class="container">
            <router-view> </router-view>
        </div>
    </div>
</template>

<script>
export default {}
</script>
