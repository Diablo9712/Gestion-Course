  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <nav class="navigation">
<br> 
        
   <a href="profile_prof.php"><i class='fas fa-user-tie' style='font-size:25px'></i><br><spane>Profile</span></a>  
                       
      <a href="afficheNote.php"><i class='far fa-sticky-note' style='font-size:25px'></i><br><span>Note</span></a> 
       <a href="module_prof.php"><i class='fas fa-book-reader' style="font-size:25px"></i><br><span>Cours</span></a> 
              

                 <a href="tableauPfeProf.php"> <i  style="font-size:30px; "  class="glyphicon glyphicon-education" data-toggle="modal" data-target="#myModal"></i> 
<br><span>End of studies project</span></a> 
       <a href="view.php"> <i class="fa fa-commenting-o" style="font-size:29px"></i> <span>Claim</span></a> 

                  <a href="tableLive.php"><i class='fas fa-file-video' style='font-size:25px'></i><span>live</span></a>   
                    
                  <a href="deconnecter.php"><i class="glyphicon glyphicon-log-out" style='font-size:20px'></i><span>log-out</span></a>        

                        

        </ul>

    </nav>
   <section class="codepen-style">
       <a href=""> <h1><span>Professor </span>Area</h1> </a>
      
    </section>
    
    <style type="text/css">
        
        /*  
    Side Navigation Menu V2, RWD
    ===================
    Author: @PableraShow

 */

@import url(http://pablogarciafernandez.com/css/reset.css);

/* Typography
------------------------------------- */
@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
      font-family: 'Open Sans', sans-serif;
      
      font-style: normal;
      word-spacing: normal;
      letter-spacing: normal;
      text-rendering: optimizeLegibility;
      line-height: 1.8em;
      color:#black;
}

h1 {
      font-size: 2em;
    font-weight: 300;
      line-height: 4em;
    text-transform: uppercase;
    color: #BDBDBD;
}
h2 {
      font-size: 1.4em;
    font-weight: 400;
      line-height: 1em;
}

p {
  font-size: 1.16em;
  line-height: 4em;
}

p svg {
  display: inline-block;
  vertical-align: middle;
}

a {
      font-size: 1em;
      font-weight: 400;
      line-height: 100%;
      color: #3A53BD;
}
a:hover { text-decoration: none; }

a[href$="http://pablogarciafernandez.com"] {
    font-size: 1em;
    font-weight: 700;
    letter-spacing: -0.04em;
    text-decoration: none;
    text-transform: uppercase;
    color: #575757;
    margin: 1.4em 0 1.4em;
    display: inline;
}

    /* ----------- CodePen styles ----------- */
    .codepen-style {
        padding: 2em 0 0 0;

    }

        .codepen-style h1 {
              font-family: 'Open Sans', sans-serif;
              font-size:3em; 
              font-weight: 300;
              color:#000;
              line-height:1.8em;
              text-transform: none;
        }

        .codepen-style h1 span {
              font-style: italic;
              font-weight: 700;
              text-transform: none;
              color: red;
        }

        .codepen-style h2 {
              font-weight: 300;
              text-transform: none;
        }

        .codepen-style h2 a {
            font-weight: 700;
        }
/* ----------- End CodePen styles ----------- */


/* Structure MOBILE FIRST
------------------------------------- */

body {
  background: #f1f1f1;
  padding: 1em 8% 10em;
    font-weight: bold;

}

    /* Navigation
    ----------------- */
    
    .navigation {
      height: auto;
         width: 100%;
         display: block;
    box-shadow: #D4D4D4 -1px 1px, #D4D4D4 -2px 2px, #D4D4D4 -3px 3px, #D4D4D4 -4px 4px, #D4D4D4 -5px 5px, #D4D4D4 -6px 6px;
    transform: translate3d(4px, 0px, 0);
    background-color: #D4D4D4;
 
    }

    .navigation li { width: 100%; }

    .navigation a {
          display: block;
          padding: 0.5em 0 0.5em 1em;
          margin: 0;
          line-height: 2em;
          font-weight: 400;
          color: #333;
          text-transform: uppercase;
    }
    .navigation a:hover {
          background-color: #666;
          color: #333;
     box-shadow: -1px 1px, -2px 2px, -3px 3px, -4px 4px;
      transform: translate3d(4px, -4px, 0);
      transition: .15s;
    }

.navigation a > span:after {
  content: " /";
  padding-left: 0.2em;
}

    .navigation li:nth-child(1) a { background-color: #ff0000 ; }
    .navigation li:nth-child(2) a { background-color: #ff0000 ; }
    .navigation li:nth-child(3) a { background-color: #ff0000 ; }
    .navigation li:nth-child(4) a { background-color: #ff0000 ; }
    .navigation li:nth-child(5) a { background-color: #ff0000 ; }

    .navigation li:nth-child(1) a:hover,
    .navigation li:nth-child(2) a:hover,
    .navigation li:nth-child(3) a:hover,
    .navigation li:nth-child(4) a:hover,
    .navigation li:nth-child(5) a:hover { background-color: #666; }

    .navigation svg {
          width: 30px;
          height: 1.5em;
          vertical-align: text-top;
    }
    svg {
          opacity:1;
          fill-opacity:1;
          fill-rule:nonzero;
          vertical-align: top;
          fill: #333;
    }

    .navigation a:hover svg { fill: #ff0000; }

    .navigation span{
          display: inline-block;
          padding-left: 0.5em;
    }

    /* END Navigation 
    ----------------- */


/* Structure DESKTOP
------------------------------------- */
@media only screen and (min-width: 1024px) {

    body { padding: 2em 0 0 4em; }

    header, article, section, footer {
      margin: 0 auto;
      max-width: 670px;
      width: auto;
      display: block;
    }

    header { padding-top: 0; }

    /* Navigation
    ----------------- */

    .navigation {
        transition-delay: 0s;
        transition-duration: 0.4s;
        transition-property: all;
        transition-timing-function: line;
    
    box-shadow: 0 0;
    transform: translate3d(0px, 0px, 0);
    }

    .navigation a:hover {
        transition-delay: 0s;
        transition-duration: 0.2s;
        transition-property: all;
        transition-timing-function: line;
    
    box-shadow: #ffffff -1px 1px, #ffffff -2px 2px, #ffffff -3px 3px, #ffffff -4px 4px, #ffffff -5px 5px, #ffffff -6px 6px;
    transform: translate3d(6px, 0px, 0);
    }

    .navigation {
          position: fixed;
        left: 0;
          top: 0;
          bottom: 0;
          height: 100%;
          width: 4em;
          background-color: #000066;
    }
    .navigation:hover {
          position: fixed;
      width: 10em;
    }

    .navigation ul { display: block; }

    .navigation li { display: block; }

    .navigation a {
          padding: 0.8em 0.6em 0.8em 1em;
          color: #F1F1F1;
          border-bottom: 1px solid transparent;
          border-top: 1px solid transparent;
    }

    .navigation li:nth-child(1) a,
    .navigation li:nth-child(2) a,
    .navigation li:nth-child(3) a,
    .navigation li:nth-child(4) a,
    .navigation li:nth-child(5) a { background-color: transparent; }
    .navigation a:hover {
          display: inline-block;
          padding: 0 0 0 1em;
          margin: 0;
          line-height: 2em;
          font-weight: 400;
        width: 6em; 
    }

    .navigation:hover a {
          display: inline-block;
          width: 9em;
          padding: 0.8em 0 0.8em 1em;
    }
    .navigation span { text-indent: -200px; }

  .navigation:hover span {
          display: inline-block;
          text-indent: 0;
    }
    .active { background-color: #F1F1F1; }
  
.navigation a > span:after { color: #666; }
.navigation a:hover > span:after { color: #333; }

    .navigation svg {
          width: 5px;
          height: 1em;
          vertical-align: top;
    }

    
    /* Menu position on the navigation bar */
    .menu {
          left: 0;
          position: auto;
          height: auto;
          width: auto;
    }
    .menu { top: 0; }
    /* END Menu position on the navigation bar */
    

    /* ----------------- 
        End Navigation */

}

 /* Structure DESKTOP when is 1920px height or more
------------------------------------- */
@media only screen and (min-height: 1920px){
    .navigation:hover { width: 8.592em; }
    .navigation a {
          font-size: 0.9em;
          padding: 0.8em 0.8259em 0.8em 1em;
    }

}
    </style>
