<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wordpress_plugin');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '1UH=%}Poh%G5a) **OE ~-+#tjy<D,C/`KBrp/bCH]eE,&6T$Ty*wts=)s/Xyv@}');
define('SECURE_AUTH_KEY',  'SjH+%-I1mb 8nAW*n`wRtP@b.hW}HxNhy52)s!|7^H+:ti{Y@boa>&dsZ!Gs)fgU');
define('LOGGED_IN_KEY',    '?Qt+.Z ql<?gg)X(7@]@Pv68<iO&!CxPW+}AHa5]:=WC2:()5/j{GjNmW(kU1KHO');
define('NONCE_KEY',        'FBBY1_p0soxA)yC)fB[To+WV&;^*:d{|U7:-{K^mN~Vt?nCh5S5DjNM}.h@o/Kfp');
define('AUTH_SALT',        '3kKs3g8d.(:S(XTFq?Cf$[*ox?hVlZMk|Bc7ih&iMYsun< OW)~eab^`l/1r XT ');
define('SECURE_AUTH_SALT', '0?<^b*bF:+Je]br&Kg,45s]J(+R~J:Mg~v8{O*FOKHm~%$XfJ<,Vo.yArE[(Fvi!');
define('LOGGED_IN_SALT',   '`O..DmEu0}v5Jh1-+Z|TBP#m.zYIW:#Ig4=P$_l9htH|JX40<9L>mRfolm`|px41');
define('NONCE_SALT',       ' @Zl 8%C qg?}SHr<N#ih+*Et*LN_=:?@OY^z3p,]51*4V=E66{o|B@XM4g}%su>');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
