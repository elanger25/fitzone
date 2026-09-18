# FitZone

WordPress/WooCommerce šablona podle souboru `šablona/Preline UI Figma (Community).pdf`.

- Strana 1: `/blog/`.
- Strana 2: úvodní stránka `/`.
- Strana 4: `/akce/`; stejný styl používá katalog `/shop/`.
- Strana 3 nebyla použita.

Originální fotografie jsou vytažené z PDF. Mobilní rozložení je doplněné, protože PDF obsahuje pouze desktopové návrhy. Font Manrope nahrazuje vložené obrysové písmo PDF.

Názvy a ceny produktových karet se načítají z vytvořených produktů WooCommerce. Vazby jsou uložené ve WordPress option `fitzone_product_ids`. Pořadí, ukázková hodnocení, kategorie a fotografie karet jsou definované v `functions.php`. Fotografie na úvodní stránce odpovídají příslušné straně PDF. Styly jsou v `assets/site.css`, interakce v `assets/site.js`.

Bylo doplněno 14 ukázkových produktů a 7 náhledů článků. PDF neobsahuje celé články, skutečné parametry produktů, kontakty ani obchodní podmínky; doplňkové stránky jsou připravené k vyplnění. Marketingové údaje a hodnocení jsou převzaté z návrhu. Časovač zobrazuje ukázkové hodnoty z předlohy. Sociální ikony nemají cílové účty.

Košík funguje přes WooCommerce. Platby a doprava se řídí jeho nastavením; redesign nenastavuje platební bránu. Výchozí režim WooCommerce „připravujeme“ byl na místním webu vypnut, aby bylo možné otestovat košík.

Newsletter ukládá registrace soukromě do options `fitzone_subscriber_<sha256>`; nerozesílá e-maily ani nevydává slevový kupon. Před provozním použitím je potřeba napojit mailingovou službu. Oblíbené produkty se ukládají v prohlížeči. Filtry, řazení, vyhledávání a stránkování fungují nad položkami katalogu.

Původní nastavení vzhledu je v option `fitzone_previous_settings`. Databáze před aktivací byla exportována do `/tmp/fitzone-before.sql` (dočasná záloha, mimo veřejný web).
