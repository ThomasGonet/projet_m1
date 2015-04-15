<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="" class="navbar-brand"  id="brand">M1S2I</a>
        </div>
        {{ elements.getMenu() }}
        {#<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-link" id="index">{{ link_to('', 'Accueil') }}</li>
                <li class="nav-link" id="rescue">{{ link_to('game', 'Jeux') }}</li>
                <li class="nav-link" id="about">{{ link_to('score', 'Scores') }}</li>
                <li class="nav-link" id="about">{{ link_to('iot', 'Projet IOT') }}</li>
                <li class="nav-link" id="contact">{{ link_to('contact', 'Contact') }}</li>
                <li class="nav-link" id="about">{{ link_to('about', 'A propos') }}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="">
                <li class="nav-link nav-connect" id="connect">{{ link_to('connect', 'Connexion') }}</li>
            </ul>
        </div>#}
    </div>
</nav>
<div id="bloc_page">
    {{ content() }}
</div>
<hr>
<footer>
    <p>Made with Phalcon Framework &copy; TG 2015</p>
</footer>

