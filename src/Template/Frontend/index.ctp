<section class="hestia-team " id="turniere" data-sorder="hestia_team">
    <div class="container-fluid" style="min-height: 800px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center hestia-team-title-area">
                <h2 class="hestia-title">Turniere</h2>
                <h5 class="description">Hier finden Sie, sobald verfügbar, die <b>Ausschreibung, Zeiteinteilung, Pferdelisten, Teilnehmerlisten, Ergebnisse</b> und weitere <b>Infos</b> zu den jeweiligen Veranstaltungen.<br>
                    <a class="btn btn-primary" href="https://my.equi-score.com" target="_blank">Online-Startbereitschaft</a>
                </h5>
            </div>
      </div>
      <div class="hestia-team-content">
        <div class="row  pb-5">
          <!--TAB-Links oben-->
        	<button class="tablink" onclick="openPage('Home', 'defaultOpen')" id="defaultOpen">AKTUELLE TURNIERE</button>
        	<button class="tablink" onclick="openPage('News', 'defaultClose')" id="defaultClose">VERGANGENE TURNIERE</button>
        <!--ab hier: Inhalt TABS-->
            <div id="Home" class="tabcontent">
                <?php
                    $i = 1;
                    foreach($actual as $key => $aTournament){
                        echo $this->element('turnier', [
                        'tournament' => $aTournament
                        ]);
                        if($i < sizeof($actual)){
                            echo '<hr />';
                        }
                        $i++;
                    }
                ?>
            </div>
            <div id="News" class="tabcontent">
                <?php
                    $i = 1;
                    foreach($past as $key => $pTournament){
                        echo $this->element('turnier', [
                            'tournament' => $pTournament
                        ]);
                        if($i < sizeof($past)){
                            echo '<hr />';
                        }
                        $i++;
                    }
                ?>
            </div>
        </div>
      </div>
    </div>
</section>

<script>
  function openPage(pageName, trigger) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks, page, opened, closed, shadow, color, white;
  shadow = "2px -10px 10px #EFEFEF";
  color = "#68aaa6";
  white = "#ffffff";
  page = document.getElementById(pageName);

  if(trigger == "defaultOpen"){
    opened = document.getElementById("defaultOpen");
    closed = document.getElementById("defaultClose");
  } else {
    opened = document.getElementById("defaultClose");
    closed = document.getElementById("defaultOpen");
  }

  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  page.style.display = "block";

  opened.style.backgroundColor = white;
  opened.style.color = color;
  opened.style.borderTop = "2px solid #68aaa6";
  opened.style.boxShadow = "none";

  // Add the specific color to the button used to open the tab content
  closed.style.backgroundColor = color;
  closed.style.color = white;
  closed.style.boxShadow = shadow;
  closed.style.borderTop = "none";
}

// Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
