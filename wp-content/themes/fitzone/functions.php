<?php
defined('ABSPATH') || exit;
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
});
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('fitzone', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script('fitzone', get_template_directory_uri() . '/assets/site.js', [], filemtime(get_template_directory() . '/assets/site.js'), true);
    wp_localize_script('fitzone', 'fitzone', ['ajax' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('fitzone'), 'cart' => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')]);
});
function fz_asset($name) { return get_template_directory_uri() . '/assets/' . $name . '.jpg'; }
function fz_icon($name) {
    $paths = ['star'=>'<path d="m12 2 3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z"/>','search'=>'<circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/>','user'=>'<circle cx="12" cy="7" r="4"/><path d="M4 22v-3a8 8 0 0 1 16 0v3"/>','heart'=>'<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z"/>','cart'=>'<path d="M2 3h3l3 13h11l3-10H6"/><circle cx="9" cy="21" r="1"/><circle cx="19" cy="21" r="1"/>','truck'=>'<path d="M1 5h13v13H1zM14 10h5l4 5v3h-9"/><circle cx="6" cy="19" r="3"/><circle cx="18" cy="19" r="3"/>','shield'=>'<path d="m12 2 9 4v6c0 6-9 10-9 10S3 18 3 12V6zM8 12l3 3 5-6"/>','headphones'=>'<path d="M3 14v-3a9 9 0 0 1 18 0v3M3 13h4v9H3zM17 13h4v9h-4z"/>','return'=>'<path d="M3 3v7h7M3 10a9 9 0 1 1 0 7"/>','clock'=>'<circle cx="12" cy="12" r="9"/><path d="M12 6v6l4 2"/>'];
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.($paths[$name] ?? $paths['shield']).'</svg>';
}
function fz_products() {
 $products = [
 ['dumbbell','Nakládací činka 20 kg','Činky','cinky-osy',2490,2990,'4.8','124','Akce'],
 ['bench','Multifunkční lavička ProSeries','Lavičky','lavicky',5990,7200,'4.9','87','Výprodej'],
 ['protein','Whey Protein 2 kg – Čokoláda','Výživa','vyziva',1390,1690,'4.6','445','Akce'],
 ['legpress','Leg Press 45°','Stroje','stroje',18500,22000,'4.8','44','Akce'],
 ['leggings','Kompresní legíny ProFit','Oblečení','obleceni',890,1100,'4.7','213','Akce'],
 ['bcaa','BCAA Aminokyseliny 400g','Výživa','vyziva',690,890,'4.5','187','Akce'],
 ['pulldown','Lat Pulldown & Row','Stroje','stroje',16900,19500,'4.8','55','Akce'],
 ['barbell','Olympijská osa 220 cm','Osy','cinky-osy',3490,3990,'4.8','56','Akce'],
 ['preworkout','Pre-workout Energy Boost','Výživa','vyziva',790,990,'4.6','228','Akce'],
 ['shorts','Sportovní šortky Flex','Oblečení','obleceni',690,890,'4.6','132','Akce'],
 ['adjustable-bench','Polohovatelná lavička 7 poloh','Lavičky','lavicky',4290,5000,'4.8','98','Akce'],
 ['vitamin','Vitamin D3+K2 60 kapslí','Výživa','vyziva',290,390,'4.8','341','Akce'],
 ['kettlebell','Kettlebell litinový 16 kg','Kettlebelly','cinky-osy',1190,1190,'4.7','202',''],
 ['cable','Kabel Cable Machine Pro','Stroje','stroje',24900,28000,'5','31','Novinka'],
 ['dumbbell-10','Nakládací činka 10 kg','Činky & Osy','cinky-osy',1490,1490,'','','','dumbbell-10'],
 ['dumbbell-30','Nakládací činka 30 kg','Činky & Osy','cinky-osy',3990,3990,'','','','dumbbell-30'],
 ['barbell-180','Olympijská osa 180 cm','Činky & Osy','cinky-osy',2990,2990,'','','','barbell-180'],
 ['kettlebell-8','Kettlebell litinový 8 kg','Činky & Osy','cinky-osy',690,690,'','','','kettlebell-8'],
 ['kettlebell-24','Kettlebell litinový 24 kg','Činky & Osy','cinky-osy',1790,1790,'','','','kettlebell-24'],
 ['bench-flat','Rovná posilovací lavička Compact','Lavičky','lavicky',2490,2490,'','','','bench-flat'],
 ['bench-fold','Skládací lavička HomeFit','Lavičky','lavicky',3290,3290,'','','','bench-fold'],
 ['bench-incline','Šikmá lavička na břicho Core','Lavičky','lavicky',2790,2790,'','','','bench-incline'],
 ['bench-pro','Posilovací lavička Pro 300','Lavičky','lavicky',6990,6990,'','','','bench-pro'],
 ['bench-adjust','Polohovatelná lavička 5 poloh','Lavičky','lavicky',3790,3790,'','','','bench-adjust'],
 ['legpress-compact','Leg Press Compact','Stroje','stroje',15990,15990,'','','','legpress-compact'],
 ['pulldown-home','Horní kladka HomeGym','Stroje','stroje',11990,11990,'','','','pulldown-home'],
 ['cable-dual','Dvojitá kladková věž','Stroje','stroje',27990,27990,'','','','cable-dual'],
 ['row-pro','Přítahový stroj Row Pro','Stroje','stroje',18990,18990,'','','','row-pro'],
 ['cable-home','Kladková věž Home Compact','Stroje','stroje',13990,13990,'','','','cable-home'],
 ['protein-vanilla','Whey Protein 2 kg – Vanilka','Výživa','vyziva',1690,1690,'','','','protein-vanilla'],
 ['protein-strawberry','Whey Protein 2 kg – Jahoda','Výživa','vyziva',1690,1690,'','','','protein-strawberry'],
 ['bcaa-lemon','BCAA 400 g – Citron','Výživa','vyziva',890,890,'','','','bcaa-lemon'],
 ['preworkout-berry','Pre-workout 300 g – Lesní ovoce','Výživa','vyziva',990,990,'','','','preworkout-berry'],
 ['vitamin-120','Vitamin D3+K2 120 kapslí','Výživa','vyziva',590,590,'','','','vitamin-120'],
 ['leggings-black','Kompresní legíny ProFit – Černé','Oblečení','obleceni',1100,1100,'','','','leggings-black'],
 ['leggings-blue','Kompresní legíny ProFit – Modré','Oblečení','obleceni',1100,1100,'','','','leggings-blue'],
 ['shorts-black','Sportovní šortky Flex – Černé','Oblečení','obleceni',890,890,'','','','shorts-black'],
 ['shorts-gray','Sportovní šortky Flex – Šedé','Oblečení','obleceni',890,890,'','','','shorts-gray'],
 ['leggings-high','Legíny ProFit s vysokým pasem','Oblečení','obleceni',1290,1290,'','','','leggings-high'],
 ['stair-climber','Schodový trenažér ClimbFit','Stroje','stroje',29990,29990,'','','','stair-climber'],
 ['elliptical','Eliptický trenažér EllipticFit','Stroje','stroje',14990,14990,'','','','elliptical'],
 ['treadmill','Běžecký pás RunFit','Stroje','stroje',19990,19990,'','','','treadmill'],
 ['exercise-bike','Rotoped CycleFit','Stroje','stroje',9990,9990,'','','','exercise-bike'],
 ['mat-purple','Podložka na jógu 6 mm – Fialová','Podložky','podlozky',590,590,'','','','mat-purple'],
 ['mat-black','Podložka na cvičení 10 mm – Černá','Podložky','podlozky',790,790,'','','','mat-black'],
 ['mat-cork','Korková podložka na jógu 4 mm','Podložky','podlozky',990,990,'','','','mat-cork'],
 ['creatine-300','Kreatin monohydrát 300 g','Výživa','vyziva',449,449,'','','','creatine-300'],
 ['creatine-500','Kreatin monohydrát 500 g','Výživa','vyziva',649,649,'','','','creatine-500'],
 ['whey-chocolate-500','Whey Protein 500 g – Čokoláda','Výživa','vyziva',499,499,'','','','whey-chocolate-500'],
 ['whey-vanilla-1000','Whey Protein 1 kg – Vanilka','Výživa','vyziva',899,899,'','','','whey-vanilla-1000'],
 ['whey-strawberry-1000','Whey Protein 1 kg – Jahoda','Výživa','vyziva',899,899,'','','','whey-strawberry-1000'],
 ['whey-banana-2000','Whey Protein 2 kg – Banán','Výživa','vyziva',1690,1690,'','','','whey-banana-2000'],
 ['isolate-vanilla-1000','Whey Isolate 1 kg – Vanilka','Výživa','vyziva',1190,1190,'','','','isolate-vanilla-1000'],
 ['vegan-chocolate-1000','Vegan Protein 1 kg – Čokoláda','Výživa','vyziva',990,990,'','','','vegan-chocolate-1000'],
 ['magnesium-90','Hořčík bisglycinát 90 kapslí','Výživa','vyziva',349,349,'','','','magnesium-90'],
 ['plate-2-5','Olympijský kotouč 2,5 kg – 50 mm','Činky & Osy','cinky-osy',249,249,'','','','plate-2-5'],
 ['plate-5','Olympijský kotouč 5 kg – 50 mm','Činky & Osy','cinky-osy',449,449,'','','','plate-5'],
 ['plate-10','Bumper kotouč 10 kg – 50 mm','Činky & Osy','cinky-osy',990,990,'','','','plate-10'],
 ['plate-20','Bumper kotouč 20 kg – 50 mm','Činky & Osy','cinky-osy',1790,1790,'','','','plate-20'],
 ['ez-bar','Olympijská EZ osa 120 cm – 50 mm','Činky & Osy','cinky-osy',1890,1890,'','','','ez-bar'],
 ['bar-collars','Rychlouzávěry na olympijskou osu 50 mm – pár','Činky & Osy','cinky-osy',349,349,'','','','bar-collars'],
 ['resistance-band','Odporová guma Power Band – Střední','Doplňky','doplnky',299,299,'','','','resistance-band'],
 ['speed-rope','Rychlostní švihadlo Speed Rope','Doplňky','doplnky',399,399,'','','','speed-rope'],
 ];
 // Only these four products participate in the current sale.
 foreach ($products as &$p) {
     if (!in_array($p[0], ['dumbbell', 'bench', 'protein', 'legpress'], true)) {
         $p[4] = $p[5];
         $p[8] = '';
     }
 }
 unset($p);
 $ids = get_option('fitzone_product_ids', []);
 foreach ($products as &$p) {
     $product = !empty($ids[$p[0]]) ? wc_get_product($ids[$p[0]]) : false;
     if ($product) {
         $p[1] = $product->get_name();
         $p[4] = (float) $product->get_price();
         $p[5] = (float) $product->get_regular_price();
     }
 }
 unset($p);
 return $products;
}
function fz_product_training($key) {
 // Training suitability belongs to individual products, not entire shop categories.
 $groups = [
     'silovy' => ['plate-2-5','plate-5','plate-10','plate-20','ez-bar','bar-collars','resistance-band','mat-purple','mat-black','creatine-300','creatine-500','whey-chocolate-500','whey-vanilla-1000','whey-strawberry-1000','whey-banana-2000','isolate-vanilla-1000','vegan-chocolate-1000','dumbbell','dumbbell-10','dumbbell-30','barbell','barbell-180','kettlebell','kettlebell-8','kettlebell-24','bench','adjustable-bench','bench-flat','bench-fold','bench-incline','bench-pro','bench-adjust','legpress','legpress-compact','pulldown','pulldown-home','cable','cable-dual','row-pro','cable-home','protein','protein-vanilla','protein-strawberry','bcaa','bcaa-lemon','preworkout','preworkout-berry','leggings','leggings-black','leggings-blue','shorts','shorts-black','shorts-gray'],
     'kardio' => ['speed-rope','stair-climber','elliptical','treadmill','exercise-bike','kettlebell','kettlebell-8','kettlebell-24','leggings','leggings-black','leggings-blue','shorts','shorts-black','shorts-gray'],
     'beh' => ['treadmill','leggings','leggings-black','leggings-blue','shorts','shorts-black','shorts-gray'],
     'crossfit' => ['plate-2-5','plate-5','plate-10','plate-20','bar-collars','resistance-band','speed-rope','creatine-300','creatine-500','dumbbell','dumbbell-10','dumbbell-30','barbell','barbell-180','kettlebell','kettlebell-8','kettlebell-24','shorts','shorts-black','shorts-gray'],
     'joga' => ['resistance-band','mat-purple','mat-black','mat-cork','leggings-high','leggings','leggings-black','leggings-blue'],
     'bojove' => ['speed-rope','shorts','shorts-black','shorts-gray','leggings','leggings-black','leggings-blue'],
 ];
 return array_keys(array_filter($groups, static fn($keys) => in_array($key, $keys, true)));
}
function fz_product_card($p, $sale = false) {
 $ids=get_option('fitzone_product_ids', []); $id=$ids[$p[0]] ?? 0; $url=$id ? get_permalink($id) : home_url('/shop/'); $product=$id ? wc_get_product($id) : false; if($product){$p[1]=$product->get_name();$p[4]=(float)$product->get_price();$p[5]=(float)$product->get_regular_price();} $discount=$p[5]>0 ? round((1-$p[4]/$p[5])*100) : 0;
 ?>
 <article class="product-card" data-training="<?=esc_attr(implode(' ', fz_product_training($p[0])))?>" data-category="<?=esc_attr($p[3])?>" data-price="<?=esc_attr($p[4])?>" data-discount="<?=esc_attr($discount)?>" data-name="<?=esc_attr($p[1])?>">
 <div class="product-picture"><a href="<?=esc_url($url)?>"><img src="<?=esc_url(fz_asset((is_front_page() && in_array($p[0],['dumbbell','bench','protein','barbell'],true) ? 'home-' : '').($p[9] ?? $p[0])))?>" alt="<?=esc_attr($p[1])?>" loading="lazy"></a><?php if($discount > 0):?><span class="badge"><?='−'.$discount.'%'?></span><?php endif;?><button class="favorite" data-favorite="<?=esc_attr($p[0])?>" aria-label="Uložit mezi oblíbené: <?=esc_attr($p[1])?>" aria-pressed="false"><?=fz_icon('heart')?></button></div>
 <div class="product-info"><a class="eyebrow" href="<?=esc_url(home_url('/shop/?category='.$p[3]))?>"><?=esc_html($p[2])?></a><h3><a href="<?=esc_url($url)?>"><?=esc_html($p[1])?></a></h3><?php if($p[6] !== ''):?><div class="rating"><span aria-label="<?=esc_attr($p[6])?> z 5"><?=str_repeat(fz_icon('star'),5)?></span> <small><?=esc_html($p[6].' ('.$p[7].')')?></small></div><?php endif;?><div class="price"><strong><?=esc_html(number_format($p[4],0,',',' '))?> Kč</strong><?php if($p[4]<$p[5]):?><del><?=esc_html(number_format($p[5],0,',',' '))?> Kč</del><?php endif;?></div><button class="button add-to-cart" data-product="<?=esc_attr($id)?>"><?=fz_icon('cart')?> Do košíku</button></div></article>
 <?php
}
function fz_articles() {
 return [
 ['blog-motivation','Jak si vytvořit návyk na cvičení a vydržet','Motivace','Praktické kroky, které vám pomohou zařadit pohyb do běžného týdne i ve dnech, kdy motivace chybí.',get_the_date('j. n. Y', get_option('fitzone_article_ids', [])['blog-motivation'] ?? 0),2,'blog-start'],
 ['blog-start','5 nejlepších cviků pro začátečníky','Pro začátečníky','Přehled pěti základních cviků, které vám pomohou bezpečně nastartovat silový trénink bez zkušeností.','12. 7. 2025',5],
 ['blog-homegym','Jak si sestavit domácí posilovnu za rozumnou cenu','Vybavení','Poradíme vám, jak vybavit domácí posilovnu efektivně a bez zbytečných výdajů.','8. 7. 2025',7],
 ['blog-protein','Whey protein — co to je a potřebujete ho?','Výživa','Proteiny jsou základem sportovní výživy. Ale opravdu je potřebujete a jak je správně užívat?','3. 7. 2025',6],
 ['blog-cardio','Kardio vs. silový trénink — co je lepší?','Trénink','Věčná debata — kardio nebo váhy? Odhalíme výhody i nevýhody obou přístupů.','28. 6. 2025',8],
 ['blog-recovery','Regenerace — proč je klíčová pro vaše výsledky','Zdraví','Bez regenerace nemůžete dosáhnout svých cílů. Jak správně odpočívat a maximalizovat výsledky?','22. 6. 2025',5],
 ['blog-mistakes','10 chyb, které dělají začátečníci v posilovně','Pro začátečníky','Vyhněte se nejčastějším chybám, které zpomalují pokrok a mohou způsobit zranění.','18. 6. 2025',6],
 ];
}
function fz_countdown() { ?><div class="countdown"><small>Nabídka vyprší za</small><div><?php foreach(['Dny'=>'02','Hod'=>'14','Min'=>'37','Sek'=>'22'] as $l=>$v):?><span><b><?=$v?></b><small><?=$l?></small></span><?php endforeach;?></div></div><?php }
function fz_newsletter($blog = false) { ?><form class="newsletter-form"><label class="screen-reader-text" for="email-<?=$blog?'blog':'footer'?>">Váš e-mail</label><input id="email-<?=$blog?'blog':'footer'?>" name="email" type="email" placeholder="Váš e-mail…" autocomplete="email" required><button class="button" type="submit">Přihlásit se</button><p class="form-result" role="status"></p></form><?php }
add_action('wp_ajax_fitzone_subscribe','fz_subscribe');
add_action('wp_ajax_nopriv_fitzone_subscribe','fz_subscribe');
function fz_subscribe() {
 check_ajax_referer('fitzone','nonce'); $email=sanitize_email(wp_unslash($_POST['email'] ?? ''));
 if(!is_email($email)) wp_send_json_error(['message'=>'Zadejte platnou e-mailovou adresu.'],400);
 // Store registrations privately; sending campaigns requires a newsletter service.
 $key='fitzone_subscriber_'.hash('sha256',strtolower($email));
 if(!get_option($key)) add_option($key,['email'=>$email,'registered'=>current_time('mysql')],'','no');
 wp_send_json_success(['message'=>'Děkujeme, váš e-mail jsme zaregistrovali.']);
}

function fz_reading_minutes($id) {
 return max(1, (int) get_post_meta($id, '_fitzone_reading_minutes', true));
}
