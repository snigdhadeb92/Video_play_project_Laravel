<h2 class="container">Login</h2>
<form action="{{route('login')}}" method="POST">
    @csrf
    @if ($error=Session::get('error'))
       
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</p>
    @endif
    <!--<input type="text" name="user" placeholder="username"> <br/><br/> -->
    
    <input type="email" name="email" placeholder="email"> 
    @if ($errors->has('email'))
        <span class="help-block" style="color:red;">*Please provide email</span>
    @endif

    <br/><br/>
    <input type="password" name="password" id="password" placeholder="password">
    @if ($errors->has('password'))
        <span class="help-block" style="color:red;">*Please provide password</span>
    @endif
    <br/><br/>
    <button type="submit">submit</button>
</form>