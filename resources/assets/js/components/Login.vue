<template>
    <div>
        <div class="alert alert-danger" v-if="error">
            <p v-text="errors"></p>
        </div>
        <form autocomplete="off" @submit.prevent="login" method="post">
            <div class="form-group">
                <label for="email">邮箱</label>
                <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" id="password" class="form-control" v-model="password" required>
            </div>
            <button type="submit" class="btn btn-default">登录</button>
        </form>
    </div>
</template>
<script>
  export default {
    data(){
      return {
        email: null,
        password: null,
        error: false,
        errors: {}
      }
    },
    methods: {
      login(){
        var app = this
        this.$auth.login({
            params: {
              email: app.email,
              password: app.password
            }, 
            success: function () {},
            error: function (resp) {
              app.error = true;
              app.errors = resp.response.data.error;
            },
            rememberMe: true,
            redirect: '/dashboard',
            fetchUser: true,
        });       
      },
    }
  } 
</script>