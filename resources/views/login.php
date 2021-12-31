<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body style="background-image: url(https://i.pinimg.com/originals/b6/d9/2a/b6d92a5e63be06e8ccb98d66d9d85021.jpg);background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
<div class="col d-none d-lg-block"></div>
            <div class="col">
    <div id="vue-app" class="card p-3 shadow-lg" style="
    margin-top: 20vh;
    background-color: #E0E0E0;">
        <div class="card-body">
            <h5 class="card-title">
                <center>
                    Login
                </center>
                <hr>
            </h5>
            <!-- <form> -->
            <div class="">
                <label for="exampleInputEmail1" class="form-label">Email:</label>
                <input v-model="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Email Anda">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="">
                <label for="exampleInputPassword1" class="form-label">Password:</label>
                <input v-model="password" type="password" placeholder="Masukkan Password Anda" class="form-control">
            </div><br>
            <center>
            <button class="btn btn-primary btn-user btn-block" @click="doLogin">Masuk</button>
            <a href="/daftar" class="btn btn-info btn-dark btn-block">Daftar</a>
            </center>
            <!-- </form> -->   
                                </div>
        </div>
    </div>
    <div class="col d-none d-lg-block"></div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var vm = new Vue({
            el: '#vue-app',
            data: {
                email: '',
                password: ''
            },
            methods: {
                doLogin() {
                    if (this.email === '') {
                        alert("Mohon Isi Email Anda")
                    }if(this.password === '') {
                        alert("Mohon Isi Password Anda")
                    }else{
                    $.ajax({
                url:'/api/auth/login',
                type:'post',
                data:{
                   email:this.email,
                    password:this.password
                },
                success:(res) => {
                    // var parsed_data = JSON.stringify(res);
                    // alert(parsed_data.data);
                    localStorage.setItem('user', JSON.stringify(res))
                    localStorage.setItem('token', JSON.stringify(res.token))
                    localStorage.setItem('LoggedUser', true)
                    window.location.href = "http://127.0.0.1:8000/beranda"
                },
                error: () => {
                   alert("Username atau Password Salah!")
                }

            });
        }
                }
            }
        });
    </script>
</body>

</html> 