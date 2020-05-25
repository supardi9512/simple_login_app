<template>
  <div class="container">
      <div class="card">
          <div class="card-header text-white bg-danger">Login</div>
          <div class="card-body">
              <div class="col-md-6 offset-md-3">
                  <form v-on:submit.prevent="onSubmit">
                      <div class="alert alert-danger" v-if="errors.length">
                        <div v-for="(error, index) in errors" :key="index">{{ error }}</div>
                      </div>
                      <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" placeholder="Masukkan username Anda" v-model="username">
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" placeholder="Masukkan password Anda" v-model="password">
                      </div>
                      <button class="btn btn-danger">Login</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'login',
    props: ['app'],
    data() {
        return {
            username: '',
            password: '',
            errors: []
        }
    },
    methods: {
        onSubmit() {
            this.errors = [];

            if(!this.username) {
                this.errors.push('Username tidak boleh kosong!');
            }

            if(!this.password) {
                this.errors.push('Password tidak boleh kosong!');
            }

            if(!this.errors.length)
            {
                const data = {
                    username: this.username,
                    password: this.password,
                }

                this.app.req.post('auth/login', data).then(response => {
                    this.app.user = response.data;
                    this.$router.push('/');
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            }


        }
    }
}
</script>

<style>

</style>