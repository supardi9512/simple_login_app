<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <router-link to="/" class="navbar-brand">Simple Login</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link to="/" class="nav-link">Home</router-link>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <div v-if="!app.user">
                            <router-link to="/login" class="nav-link">Login</router-link>
                        </div>
                        <a v-else @click="logout" href="javascript:;" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'navbar',
    props: ['app'],
    data() {
        return {
        }
    },
    methods: {
        logout()
        {
            this.app.req.post('auth/logout').then(() => {
                this.app.user = null;
                this.$router.push('/login');
            })
        }
    }
}
</script>

<style>

</style>