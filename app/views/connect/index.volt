{{ content() }}

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Connexion</h1>

        {{ form('connect/start', 'method': 'post') }}

        <div class="form-group">
            <label for="login">Username</label>
            {{ text_field("login", "size": 32, "class": "form-control", "placeholder": "Username") }}
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            {{ password_field("password", "size": 32, "class": "form-control", "placeholder": "Password") }}
        </div>
        {{ submit_button('connect', "class": "btn btn-default btn-lg btn-block") }}

        {{ end_form() }}
    </div>
</div>