<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NodDrugSpace</title>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link
    href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">


  <link href="css/style.css" rel="stylesheet">

</head>

<body>
<script>
    function myFunction() {
      // Declaration  des variables
      let input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName('li');
    
      // trie alphabetique
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
    </script>

  <?php $forum = true ?>
  <?php include("header.php") ?>
  <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="barderecherche">
           
           <input class="form-control" type="text"  id="myInput" onkeyup="myFunction()" placeholder="Rechercher une catégorie" aria-label="Search"> 
           <ul id="myUL" style="list-style: none;">
            <li><a class="categorie" nav-link href="#"  style="text-decoration: none;" >Overdose</a></li>
            <li><a class="categorie"href="#"  style="text-decoration: none;">Cocaine</a></li>
          
            <li><a class="categorie" href="#"  style="text-decoration: none;">Crack</a></li>
            <li><a  class="categorie" href="#"  style="text-decoration: none;">Canabis</a></li>
          </ul>
          </div>
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner  rounded">
              
                <div id="aniki">
                 
                    <div class="">
                                        <div class="">
                                <img alt="" class="" src="" width="35" height="35">                </div>
                                    <div class="">
                            <strong>Le Pélican</strong>
                            <strong class="categorie" id="categorie" ><span>Crack</span></strong>
                        </div>
            
                        
                        <div class="comment-meta commentmetadata">
                            23 septembre 2019            </div>
                    </div>
            
                    <div class="aniki">
                        <p>Bonjour Nancy,</p>
                        Bonjour. Je prends du tramadol ( 350mg/jour) depuis très longtemps pour une polyarthrite. J’ai une grosse poussée depuis quelques semaines et hier m’a rhumatologue m’a fait supprimer le tramadol et remplacer par un comprimé de valtran 100 retard le soir. Ce que j’ai fais hier. Aujourd’hui pas de tramadol ce matin. Je suis dans un état pas possible, chaud, froid, sueur, engourdissement, éternuements, fatigue intense,… Je ne sais pas quoi faire. Hier je lui ai parlé de ma peur du symptôme de sevrage et elle m’a répondue  » c’est possible ». Aidez moi. J’ai une fille qui a besoin de moi et ça plus ma maladie c’est insupportable. Donnez moi des conseils svp en plus vue ce que ça me fait là j’ai vraiment envie d’arrêter cette saloperie temps que je suis lancée.
                             </div>

                </div>
                
                  
            </div>
            <div class="cta-inner1  rounded">
                  
              <div>
                 
                <h6 class="nomuser1">Aniki</h6>
                  <div class="">
                    C'est la réponse aui est la hein !!!! je sais plus quoi ecrit tellemnt fatigué. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil mollitia perferendis quia incidunt quod iure dignissimos animi aut eligendi. Eius iure eligendi expedita dicta error, sunt molestias laboriosam officiis quis.
                  </div>

              </div>
              
            
                
          </div>

          <div class="form-group purple-border">
              <h6 class="nomuser">Aniki</h6>
              <textarea class="form-control" id="exampleFormControlTextarea3" rows="2"></textarea>
              
            </div>
            
           
          </div>
        </div>
      </div>
    </section>

    <section class="page-section about-heading">
      <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/about.jpg" alt="">
        <div class="about-heading-content">
          <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
              <div class="bg-faded rounded p-5">
                <h2 class="section-heading mb-4">
                  <span class="section-heading-upper">No drug's Space</span>
                  <span class="section-heading-lower">notre plateforme</span>
                </h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat ipsum odit veniam voluptas quod sapiente, sit atque placeat ipsa magnam velit fugit expedita nam animi earum, nisi labore ut blanditiis..</p>
                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit <em>odit</em>Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam, labore rem reiciendis, repellat officiis nam quasi saepe sunt ducimus, velit inventore nemo ab perferendis laudantium mollitia ipsa aliquam quas..</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur tempora, cum iure beatae voluptate expedita? Aliquid, numquam. Eligendi eaque tempora, fuga minus quia recusandae commodi ex impedit sint placeat hic?  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  


  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; <a href="www.github.com/slyaniki">Aniki</a></p>
    </div>
  </footer>


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $('.list-hours li').eq(new Date().getDay()).addClass('today');
  </script>

</body>

</html>