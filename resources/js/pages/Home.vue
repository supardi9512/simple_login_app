<template>
    <div class="container">
        <h2 v-if="!app.user">Anda belum login.</h2>
        <h2 v-else>Selamat datang, {{ app.user.name }}.</h2>
    </div>
</template>

<script>
export default {
    name: 'home',
    props: ['app'],
    data() {
        return {
        }
    },
}
</script>

<style>

</style>