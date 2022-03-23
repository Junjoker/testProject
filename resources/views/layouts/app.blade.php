<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" integrity="sha512-3icgkoIO5qm2D4bGSUkPqeQ96LS8+ukJC7Eqhl1H5B2OJMEnFqLmNDxXVmtV/eq5M65tTDkUYS/Q0P4gvZv+yA==" crossorigin="anonymous" referrerpolicy="no-referrer"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <title>Site junior</title>
</head>
<body style="font-family: 'Raleway', sans-serif;">

<div class="container-fluid m-0" style="background-color: white;text-align: center;margin-top:0.1rem;">
        <div class="row" style="min-height: 100vh;background-color:   #f7f7f9;white-space:nowrap;flex-wrap:nowrap;">
            <div class="col p-0 shadow bg-dark mt-n1 shadow-top-none d-none1 d-lg-block" id="sideBar" style="max-width:max-content;min-width:19rem;position:relative;z-index:10!important">
                <div class="py-4">
                    <div class="mb-4 mt-0 text-center p-3 container-fluid ">
                        <img src="{{asset('images/logo.png')}}" alt="logo" class="img mx-auto mb-2" style="width:6rem;height:4.5rem">
                        <h5 class="text-uppercase text-white" style="margin-bottom: -.5rem;">Plan your task</h5>
                    </div>
                    <hr style="border-top:1px solid rgb(121, 121, 121)">
                  
 
                    <!-- <hr> -->
                    <ul class="nav d-block nav-tabs nav-justified text-left" id="myTab" role="tablist" style="border: none;">
                       @if(!Auth::user()->role)
                        <li class="nav-item @if( $active == 'dash') active @endif">

                            <a class="nav-link" href="{{route('dashboard')}}">
                                <i class="fas fa-columns dash"></i> DASHBOARD </a>
                        </li>
                        <li class="nav-item d-flex  justify-content-between " onclick="subDashMenu('subDashMenu1','fa-angle-left1')">
                            <a class="nav-link text-uppercase">
                                <i class="fas fa-tasks dash"></i> Gestion de tâche </a>
                            <i class="fas   fa-angle-left  my-auto mr-3" id="fa-angle-left1" style="--color:#A4A4A8;--top:0rem"></i>
                        </li>

                        <div class="subOnglet " id="subDashMenu1" style="display: none; ">
                            <li class="nav-item @if( $active == 'add') active @endif">
                                <a href="{{route('tache.create')}}" class="nav-link text-uppercase">
                                    <i class="fas fa-dot-circle dash1 br" style="font-size:10px; --top:-0.1rem"></i> Ajouter une tâche
                                </a>
                            </li>
                            <li class="nav-item @if( $active == 'all') active @endif">
                                <a href="{{route('tache.index')}}" class="nav-link text-uppercase">
                                    <i class="fas fa-dot-circle dash1 br" style="font-size:10px; --top:-0.1rem"></i> Mes tâches
                                  </a>
                            </li>
                        </div>
                        @else

                        <li class="nav-item @if( $active == 'l-user') active @endif">

                            <a class="nav-link text-uppercase" href="{{ route('user.index')}}">
                                <i class="fas fa-users dash"></i> Liste des utilisateurs </a>
                        </li>
                        <li class="nav-item @if( $active == 'l-tache') active @endif">

                            <a class="nav-link text-uppercase" href="{{ route('tache.indexAdmin')}}">
                                <i class="fas fa-tasks dash"></i> Liste des tâches </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col p-0">

                <div class="container-fluid shadow-sm bg-white py-3 px-3 px-sm-4 text-left d-flex justify-content-between">
                    <div class="d-flex">
                        <i class="fas fa-bars my-auto mr-3 text-cafe" onclick="sideBarToggle()" style="cursor: pointer;"></i>
                        <a href="/" class="btn btn-info my-auto px-3 py-1 text-white br50 mr-2" style="font-size: 13px;box-shadow: 0 .35rem .5rem rgba(0,0,0,.095) !important;">
                            Acceuil</a>
                         
                    </div>
                    <div class="my-auto d-flex text-right">
                        <a href="" data-bs-toggle="modal" data-bs-target="#invitation" class="btn btn-primary my-auto px-3 py-1 mr-3 text-white br50" style="font-size: 13px;box-shadow: 0 .35rem .5rem rgba(0,0,0,.095) !important;">
                            
                            <span class="d-block d-sm-none">Inviter</span>
                            <span class="d-none d-sm-block">Inviter un utilisateur</span>
                        </a>
                         <div  class=" text-left px-3 d-flex my-auto media justify-content-center" style="cursor:pointer" onclick="afficheSubmenu()">
                        <div class="d-flex my-auto" >
                            <img src="{{asset('images/avatar-1.png')}}" alt="photo de profil" class="mr-2 my-auto" style="height: 50px;border-radius:50%;border:5px solid#f7f7f9">
                        </div>
                        <div class="my-auto pl-3">
                            <i class="fas fa-angle-down dash"></i>
                        </div>
                    </div>
                    </div>
                    <!-- <div class="submenu subMedia text-left pb-0">
                        <ul class="px-0 pb-0">
                            <li class="first"> <a href="https://www.bluemindfoundation.org/admin/logout">Déconnexion</a> </li>
                            <li class="mb-n3"> <a href="https://www.bluemindfoundation.org/admin/change-password"> Changer de mot de passe</a></li>
                        </ul>
                        <div class="removeMenu" onclick="afficheSubmenu()"></div>
                    </div> -->
                     <div class="disabledPopup"  onclick="afficheSubmenu()"> </div>
                    <div class="popup profilContentSub  subProfil bg-white  p-4 shadow-lg">
                       
                         <div class="profilContentInSub">
                         <img src="{{asset('images/avatar-1.png')}}" alt="profil" class="profil">
                         </div>
                         <div class="container-fluid px-0 pt-3 text-center">
                         <h6 class="para1 font-bold mb-0">{{ Auth::user()->username ? Auth::user()->username : Auth::user()->name." ".Auth::user()->prenom }}</h6>
                         <small>{{ Auth::user()->email}}</small>
                         </div>
                         <div class="mt-3 d-flex px-0 mx-0">
                         <form action="{{ route('logout')}}" method="post" class="container-fluid">
                            @csrf
                            <input type="submit" class="btn btn-secondary text-white py-2 col-12 font-bold-500 mr-2 br" value="Deconnexion">
                        </form>
                         <!-- <span class="btn btn-secondary text-white py-2  col-12 font-bold-500 mr-2 br" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="500" @click="alert(1)">Deconnexion</span> -->
                         <!-- <span class="btn btn-success py-2 col-6 font-bold-500 br" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1500" @click="alert(2)">Profil </span> -->
                         </div>
                    </div>
                </div>


                <div class="conatiner-fluid px-3 px-sm-5 py-3 py-sm-5">
                    @yield('appContent')
                </div>
            </div>
        </div>
        <!-- Modal Invitation-->
        <div class="modal fade" id="invitation1" tabindex="-1" aria-labelledby="invitationLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-none">
                        <!-- <h4 class="modal-title fw-bold" id="addPresentationLabel">N</h4> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center pb-5">
                        
                    </div>
                    <br><br>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade invitation" id="invitation" tabindex="-1" role="dialog" aria-labelledby="invitationTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center py-5">
            <h3 style="font-weight:bold">Lien de parrainage </h3>

            <span>Veuillez choisir un moyen de partage</span>
            <br>
            <div class="d-flex  justify-content-center pt-4 pb-3">
                <div class="px-2 py-1 mr-3 my-auto" style="border-radius:50%;background-color:#646363;width:max-content">
                    <a onclick="copyAdminLink()" style="cursor: pointer;" title="Copier le lien">
                        <i class="fas fa-copy my-auto " style="color:#fff;font-size:1.2em"></i>
                    </a>
                </div>
                <div class="px-2 py-1 mr-3 my-auto" style="border-radius:50%;background-color:#CA0011;width:max-content">
                    <a href="mailto:?&subject=Lien d'inscription&cc=&bcc=&body=https://www.bluemindfoundation.org/admin/register?c=M3wNQ1" target="blank" title="Gmail">
                        <i class="fas fa-envelope my-auto " style="color:#fff;font-size:1.2em"></i>
                    </a>
                </div>
                <div class="px-2  py-1 mr-3 my-auto" style="border-radius:50%;background-color:#06047E;width:max-content">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.bluemindfoundation.org/admin/register?c=M3wNQ1" title="Facebook">
                        <i class="fab fa-facebook-f my-auto " style="color:#fff;font-size:1.2em"></i>
                    </a>
                </div>
                <div class="px-2 py-1 mr-3 my-auto" style="border-radius:50%;background-color:#068317;width:max-content">
                    <a href="https://api.whatsapp.com/send?text= Inviter un administrateur via whatsapp, Lien: https://www.bluemindfoundation.org/admin/register?c=M3wNQ1" data-action="share/whatsapp/share" target="blank" title="Whatsapp">
                        <i class="fab fa-whatsapp my-auto " style="color:#fff;font-size:1.2em"></i>
                    </a>
                </div>
                <div class="px-2 py-1 mr-3 my-auto" style="border-radius:50%;background-color:#1E83C7;width:max-content">

                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.bluemindfoundation.org/admin/register?c=M3wNQ1" target="blank" title="Linkedin">
                        <i class="fab fa-linkedin-in my-auto " style="color:#fff;font-size:1.2em"></i>
                    </a>
                </div>

            </div>
            <a style="text-decoration: underline;color:#06047E">
                
                <input class="form-control inviter-admin" type="text" value="https://www.bluemindfoundation.org/admin/register?c=M3wNQ1" readonly>
            </a>
        </div>
      
      </div>
    </div>
  </div> <!-- surplus de div -->
        <!-- End modal -->
        <style>
            .subProfil,.disabledPopup{
                display:none!important;
                visibility: hidden!important;
                opacity: 0 !important;
            }
            .subProfil.active,.disabledPopup.active{
                display:block!important;
                visibility: visible!important;
                opacity: 1 !important;
            }
              .profil{
      width:3rem;
      height:3rem;
      cursor:pointer;
      border-radius:50%;
      border:3px solid #B9B9B9;
    
    }
    .profilContentInSub {
      width:6rem;
      height:6rem;
      border-radius:50%;
     border:3px solid #D4D6D5;
     margin: auto
    }
      .profilContentInSub img{
      width:100%;
      height:100%;
      border-radius:50%;
      }
    .profilContent{
       border-radius:50%;
      border:3px solid #FFEEE2;
    }
    .popup{
      position:absolute;
      background-color:#fff;
      top: 5rem!important;
      right:1rem!important;
      border-radius:1rem;
     z-index:10;
     max-width:max-content!important;
     min-width:20rem;
    }
    .profilContentSubLi{
      margin-left:0!important;
      display:block;
    }
     .profilContentSubLi a{
        color:#fff
    }
    .profilContentSubUl hr{
      border-top:2px solid #fff!important
    }
    .disabledPopup{
      position:absolute;
      width:100%;
      height:100vh;
      top:0;
      left:0;
      z-index:2;
    }
           .shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075) !important;
}
            .nav-link {
                text-align: left;
                color: #BEBEBE !important;
                font-size: 15px;
                padding-left: 2rem !important;
                white-space: nowrap;
            }
            .nav-pills .nav-link {
            
            color: gray !important;
            font-weight : 600!important
                 }
            .nav-pills .nav-link.active {
            
                color: #fff !important;
            }

            .subOnglet {
                background-color: #FFEEDD;
            }

            .subOnglet a,
            .subOnglet i {
                color: #FD7309 !important;
            }

            .nav-link:hover {
                color: #6C8AEE !important;
                border: none !important;
            }

            .nav-item:hover {
                border: none !important;
                color: #6C8AEE !important;
            }

            .nav-item {
                padding: 1rem 0rem;
                white-space: nowrap;
                cursor: pointer;
            }

            .nav-item.active {
                padding: 1rem 0rem;
                background-color: #DDF1FF;
                border-right: 3px solid #6C8AEE;
                width: calc(100% + 3px);
            }

            .nav-item.active .nav-link {
                color: #363636 !important;
                font-weight: 700;
            }

            .nav-item.active i {
                color: #6C8AEE;
                font-size: 18px;
            }

            i.dash {
                color: #728077;
                font-size: 15px;
                --top: 0.3rem;
                margin-right: .5rem;
            }

            .enteteH1 {
                display: none !important;
            }

            .auth {
                display: flex !important;
            }

            h2.bienvenue {
                color: #FF2969;
                font-size: 2.5rem;
                font-weight: bold;
            }

            h6.bienvenue {
                color: #353333;
                font-size: 1rem;
            }

            .pied {
                display: none;
            }

            .br {
                border-radius: 10px;
            }

            #nav {
                /* box-shadow: none!important; */
                border: none !important;
                z-index: 100;
                position: sticky;
            }

            .subOnglet i {
                color: #A6DA92 !important;

            }

            .subOnglet a {
                color: #D8D8D8 !important;

            }

            .subOnglet {
                background-color: #363636 !important;

            }

            .dash1 {
                margin-right: .5rem;
            }

            .subOnglet li {
                padding-left: 1.5rem !important;
            }

            .removeMenu {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                z-index: -3;
                /* border:3px solid lime */
            }
             .nav-item > i{
                color: #ADE7BE;
            } 

            /*======================= Subemenu Design ========================================*/
            .submenu {
                position: absolute;
                background-color: #041D3A;
                padding: 0;
                visibility: hidden;
                opacity: 0;
                transition: 0.3s all;
                z-index: 15
            }

            .subMedia.active {
                visibility: visible !important;
                opacity: 1 !important;
            }

            /* .submenu:hover{
            visibility: visible;
            opacity: 1;
        } */
            /* .media:hover + .subMedia{
            visibility: visible;
            opacity: 1;
        }

        .subMedia ul:hover + .subMedia{
            visibility: visible!important;
            opacity: 1!important;
        } */
            .submenu::before {
                content: "";
                position: absolute;
                margin-top: 2.5rem;
                margin-left: -1.1rem;
                transform: rotate(-90deg);
                width: 1.2rem;
                height: 1rem;
                background-color: #041D3A;
                padding: 0;
                clip-path: polygon(51% 0%, 0% 100%, 100% 100%);
            }

            .submenu li {
                list-style-type: none;
                color: #fff;
                padding: .6rem 1rem;
            }

            .submenu li.first {
                border-bottom: 1px solid #FFEBD483;
            }

            .submenu li:hover {
                background-color: #E95D00;
                border: none;
            }

            .submenu li a {
                color: #fff;
                width: 100% !important;
                height: 100%;
                padding: .6rem 1rem;
            }

            .subMedia {
                left: 18rem;
                margin-top: -5rem;
                visibility: hidden !important;
                opacity: 0 !important;
            }

            .darkmode-toggle {
                z-index: 5000 !important
            }
            *{
                white-space:normal!important
            }
            /*================================= Fin Subemenu Design ===============================*/
        </style>
        <!-- ========================Script======================= -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      
        <!-- ======================End Script======================= -->
        <script>
//             setInterval(function () {Swal.fire({
//   position: 'top-end',
//   icon: 'info',
//   title: 'Votre tâche va prendra fin dans 2 jours ',
//   showConfirmButton: false,
//   timer: 1500
// })}, 3000);
//             function addDarkmodeWidget() {
//     new Darkmode().showWidget();
//   }
//   window.addEventListener('load', addDarkmodeWidget);
        </script>
        <script>
            import Darkmode from 'darkmode-js';

new Darkmode().showWidget();
const options = {
  bottom: '64px',
  right: 'unset',
  left: '32px',
  time: '0.5s',
  mixColor: '#fff',
  backgroundColor: '#fff',
  buttonColorDark: '#100f2c',
  buttonColorLight: '#fff',
  saveInCookies: false,
  label: '🌓 Passer en mode sombre',
  autoMatchOsTheme: true
}

const darkmode = new Darkmode(options);
darkmode.showWidget();

        </script>
        <script>
            function subDashMenu(id, icone) {
                $('#'+id).slideToggle('slow')
                $('#'+icone).toggleClass('fa-angle-left','slow')
                $('#'+icone).toggleClass('fa-angle-down','slow')
            }
        </script>
        <script>
            var sideWidth =  $('#sideBar').width();
            if(screen.width < 900){
                $('#sideBar').css({'width': "0",'min-width':"0",'max-width':"0",'opacity':"0",'overflow':"hidden"})
            }
            $(window).resize(function(){
                if(screen.width < 900){
                $('#sideBar').css({'width': "0",'min-width':"0",'max-width':"0",'opacity':"0",'overflow':"hidden"})
            }
            });
            function sideBarToggle(){

                if( $('#sideBar').width() != 0){
                    sideWidth = $('#sideBar').width()
                    $('#sideBar').css('overflow','hidden')
                    $('#sideBar').animate({width: "0",minWidth:"0",maxWidth:"0",opacity:"0"})
                }
                else{
                    $('#sideBar').css('overflow','visible')
                    $('#sideBar').animate({width: sideWidth+"px",minWidth:sideWidth+"px",maxWidth: sideWidth+"px",opacity:"1"});
                }

            }
            function afficheSubmenu(){

                $('.subProfil').toggleClass('active')
                $('.disabledPopup').toggle('active')


            }
        </script> 
          @yield('scripts')
</body>
</html>