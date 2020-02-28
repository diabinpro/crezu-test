<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crezu
 */

?>

    </div><!-- .container -->
  </div><!-- .site-content -->

  <footer class="footer">
    <div class="container">
      <nav class="footer-menu">
        <ul class="footer-menu__list">
          <li class="footer-menu__item"><a class="footer-menu__link" href="#">О нас</a></li>
          <li class="footer-menu__item"><a class="footer-menu__link" href="#">Как это работает?</a></li>
          <li class="footer-menu__item"><a class="footer-menu__link" href="#">FAQ</a></li>
          <li class="footer-menu__item footer-menu__item_active"><a class="footer-menu__link" href="#">Блог</a></li>
        </ul>
      </nav>

      <p class="footer__text">
        Crezu является торговой маркой компании Fininity Ltd (регистрационный номер: 14523902, адрес: улица Тарту, 84а, Таллинн, 10112, EE.)
        Данный сайт не является финансовым учреждением, банком или кредитором. Сервис Crezu подбирает кредиты для клиентов, выступая в качестве посредника между клиентом, который хочет получить кредит, и лицензированным финансовым учреждением. Сервис не несет ответственности за какие-либо кредитные соглашения. Данный сайт не взимает плату за обслуживание, а также не несет ответственности за действия, бездействие или процентные ставки любого кредитора. Вы не обязаны использовать услуги Crezu, вступать в контакт или запрашивать кредит у кредиторов, представленных на данном сайте.
      </p>

      <div class="footer__bottom">
        <nav class="footer-menu footer-menu_bottom">
          <ul class="footer-menu__list">
            <li class="footer-menu__item"><a class="footer-menu__link" href="#">Terms</a></li>
            <li class="footer-menu__item"><a class="footer-menu__link" href="#">Privacy</a></li>
            <li class="footer-menu__item"><a class="footer-menu__link" href="#">Cookies</a></li>
          </ul>
        </nav>

        <div class="footer__copyright">© 2019 Crezu.com.ua</div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>

</body>
</html>
