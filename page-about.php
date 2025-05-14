<?php
/**
 * Template Name: about
 */
get_header();

?>
    <div class="breadcrumbs-container">
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>
    </div>

<div class="page-header">
  <div class="container">
    <h2 class="page-title"><?php echo get_the_title(); ?></h2>
    <?php the_archive_description('<div class="page-description">', '</div>'); ?>
    <div class="inner-padding">
      <div class="lang-switcher">
        <button id="lang-toggle-btn" onclick="toggleLang()">Deutsch</button>
      </div>

      <div id="lang-en" class="lang-content">
        <h3>Hello, I'm Jihye!</h3>
        <p>I’m a media artist and aspiring WordPress developer based in Berlin. <br>I love building creative, simple digital tools for artists and communities.<br></p>
        <div class="about-container">
        <div class="profile-pic">
            <img src="<?php echo get_template_directory_uri(); ?>/img/about-img-jihye.jpg" alt="My Photo">
            <p style="margin: 0px; font-size: 11px;">AI-generated illustration created with ChatGPT</p>
            </div>
          
          <div class="skills-wrapper">
            <div class="grid-typo">
              <h6>PROFESSIONAL EXPERIENCE</h6>
              <p>- Sales Assistant and Waitress 
              <br>at Harry's Weinladen, Braunschweig
              <br>April 2019 – October 2021
              <br>- Administrative Assistant 
              <br>at DN Solutions, Dormagen
              <br>January 2023 – August 2023
              <br>- Media Artist 
              <br><a href="https://jihye-kim.de/about" target="_blank" rel="noopener noreferrer">Artistic career🔗</a>
              </p>
            </div>
            <div class="grid-typo">
              <h6>EDUCATION</h6>
              <p>- 2017–2021: Diploma in Fine Arts,
              <br>HBK Braunschweig
              <br>- 2025–present: M.F.A. Art in Context,
              <br>University of the Arts, Berlin
              </p>
            </div>              
                          
          </div>
          <div class="skills-wrapper2">
          <div class="grid-typo">
              <h6>SKILLS</h6>
              <!-- <h6>Soft Skills</h6> -->
              <p>- Strong communication skills
              <br>- Enjoy learning new skills
              <br>- Teamwork
              </p>
              <!-- <h6>Hard Skills</h6> -->
              <p>- HTML (Very good)
              <br>- CSS (Very good)
              <br>- JavaScript (Basic knowledge)
              <br>- WordPress (Very good)
              <br>- Photoshop (Very good)
              <br>- InDesign (Very good)
              <br>- Lightroom (Basic knowledge)
              <br>- After Effects (Very good)
              <br>- MS Excel/Word (Good)
              </p>
            </div>

          <div class="grid-typo">
              <h6>LANGUAGES</h6>
              <p>- German C1 Certificate
              <br>- English B2 Level
              <br>- Korean Native
              </p>
          </div>


          </div>
        </div>
      </div>
      
      <div id="lang-de" class="lang-content" style="display: none;">
        <h3>Hallo, ich bin Jihye!</h3>
        <p>Ich bin Medienkünstlerin und angehende WordPress-Entwicklerin mit Sitz in Berlin. <br>Ich liebe es, kreative und einfache digitale Tools für Künstler:innen und Communities zu entwickeln.</p>
                    <!-- about.html -->
        <div class="about-container">
        <div class="profile-pic">
          <img src="<?php echo get_template_directory_uri(); ?>/img/about-img-jihye.jpg" alt="Mein Foto">
          <p style="margin: 0px; font-size: 11px;">AI-generated illustration created with ChatGPT</p>

        </div>
        <div class="skills-wrapper">
          <div class="grid-typo">
            <h6>BERUFLICHE ERFAHRUNG</h6>
            <p>- Verkäuferin und Kellnerin  
            <br>bei Harry's Weinladen, Braunschweig  
            <br>April 2019 – Oktober 2021  
            <br>- Verwaltungsassistentin  
            <br>bei DN Solutions, Dormagen  
            <br>Januar 2023 – August 2023  
            <br>– Medienkünstlerin
            <br><a href="https://jihye-kim.de/about" target="_blank" rel="noopener noreferrer">Künstlerischer Werdegang🔗</a>
            </p>
          </div>              
          <div class="grid-typo">
            <h6>BILDUNGSWEG</h6>
            <p>- 2017–2021: Diplom in Freier Kunst,  
            <br>HBK Braunschweig  
            <br>- 2025–heute: M.F.A. Art in Context,  
            <br>Universität der Künste Berlin  
            </p>
          </div>

                        
        </div>
        <div class="skills-wrapper2">
          <div class="grid-typo">
            <h6>FÄHIGKEITEN</h6>
            <!-- <h6>Soft Skills</h6> -->
            <p>- Starke Kommunikationsfähigkeiten 
            <br>- Freude am Lernen neuer Fähigkeiten
            <br>- Teamfähigkeit
            </p>
            <!-- <h6>Hard Skills</h6> -->
            <p>- HTML (Sehr gut)  
            <br>- CSS (Sehr gut)  
            <br>- JavaScript (Grundkenntnisse)  
            <br>- WordPress (Sehr gut)  
            <br>- Photoshop (Sehr gut)  
            <br>- InDesign (Sehr gut)  
            <br>- Lightroom (Grundkenntnisse)  
            <br>- After Effects (Sehr gut)  
            <br>- MS Excel (Grundkenntnisse)  
            <br>- MS Excel/Word (Gut)
            </p>
          </div>

          <div class="grid-typo">
            <h6>SPRACHEN</h6>
            <p>- Deutsch C1 Zertifikat  
            <br>- Englisch B2 Niveau  
            <br>- Koreanisch Muttersprache  
            </p>
          </div>
        </div>
      </div>      
      </div>

    </div>
  </div>
</div>



<div class="container">
  <div class="inner-padding">
    <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          the_content();
        endwhile;
      endif;
    ?>

  </div>
</div>




<?php get_footer(); ?>

<script>
  let currentLang = 'en';  // Default language is English

  function toggleLang() {
    if (currentLang === 'en') {
      // Switch to German
      document.getElementById('lang-en').style.display = 'none';
      document.getElementById('lang-de').style.display = 'block';
      document.getElementById('lang-toggle-btn').textContent = "English";
      currentLang = 'de';
    } else {
      // Switch to English
      document.getElementById('lang-en').style.display = 'block';
      document.getElementById('lang-de').style.display = 'none';
      document.getElementById('lang-toggle-btn').textContent = "Deutsch";
      currentLang = 'en';
    }
  }
</script>