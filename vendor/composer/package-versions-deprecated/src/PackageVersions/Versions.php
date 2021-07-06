<?php

declare(strict_types=1);

namespace PackageVersions;

use Composer\InstalledVersions;
use OutOfBoundsException;

class_exists(InstalledVersions::class);

/**
 * This class is generated by composer/package-versions-deprecated, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 *
 * @deprecated in favor of the Composer\InstalledVersions class provided by Composer 2. Require composer-runtime-api:^2 to ensure it is present.
 */
final class Versions
{
    /**
     * @deprecated please use {@see self::rootPackageName()} instead.
     *             This constant will be removed in version 2.0.0.
     */
    const ROOT_PACKAGE_NAME = '__root__';

    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    const VERSIONS          = array (
  'composer/package-versions-deprecated' => '1.11.99.2@c6522afe5540d5fc46675043d3ed5a45a740b27c',
  'doctrine/annotations' => '1.13.1@e6e7b7d5b45a2f2abc5460cc6396480b2b1d321f',
  'doctrine/cache' => '2.0.3@c9622c6820d3ede1e2315a6a377ea1076e421d88',
  'doctrine/collections' => '1.6.7@55f8b799269a1a472457bd1a41b4f379d4cfba4a',
  'doctrine/common' => '3.1.2@a036d90c303f3163b5be8b8fde9b6755b2be4a3a',
  'doctrine/dbal' => '2.13.2@8dd39d2ead4409ce652fd4f02621060f009ea5e4',
  'doctrine/deprecations' => 'v0.5.3@9504165960a1f83cc1480e2be1dd0a0478561314',
  'doctrine/doctrine-bundle' => '2.3.2@d6b3c37804539a24ba8a7d647a6144cab2f13242',
  'doctrine/doctrine-migrations-bundle' => '3.1.1@91f0a5e2356029575f3038432cc188b12f9d5da5',
  'doctrine/event-manager' => '1.1.1@41370af6a30faa9dc0368c4a6814d596e81aba7f',
  'doctrine/inflector' => '2.0.3@9cf661f4eb38f7c881cac67c75ea9b00bf97b210',
  'doctrine/instantiator' => '1.4.0@d56bf6102915de5702778fe20f2de3b2fe570b5b',
  'doctrine/lexer' => '1.2.1@e864bbf5904cb8f5bb334f99209b48018522f042',
  'doctrine/migrations' => '3.2.0@072c11c1dcfced4505e29a0487b06ea774c403f4',
  'doctrine/orm' => '2.9.3@82e77cf5089a1303733f75f0f0ed01be3ab9ec22',
  'doctrine/persistence' => '2.2.1@d138f3ab5f761055cab1054070377cfd3222e368',
  'doctrine/sql-formatter' => '1.1.1@56070bebac6e77230ed7d306ad13528e60732871',
  'easycorp/easyadmin-bundle' => 'v3.4.1@b4b17bf13e954ac61badd5286d9ea247676c0a9c',
  'egulias/email-validator' => '2.1.25@0dbf5d78455d4d6a41d186da50adc1122ec066f4',
  'friendsofphp/proxy-manager-lts' => 'v1.0.5@006aa5d32f887a4db4353b13b5b5095613e0611f',
  'friendsofsymfony/ckeditor-bundle' => '2.3.0@282c79b0d3eda68855ea4c8732ab8d249cd5fbd0',
  'google/recaptcha' => '1.2.4@614f25a9038be4f3f2da7cbfd778dc5b357d2419',
  'guzzlehttp/psr7' => '1.8.2@dc960a912984efb74d0a90222870c72c87f10c91',
  'impulze/intervention-image-bundle' => '1.2.2@c3deeccf289950d6c2b91443a9bdfa73a49a7193',
  'intervention/image' => '2.5.1@abbf18d5ab8367f96b3205ca3c89fb2fa598c69e',
  'jms/metadata' => '2.5.0@b5c52549807b2d855b3d7e36ec164c00eb547338',
  'knplabs/knp-components' => 'v3.0.2@7db2eb032591ded5809455af8a4dfdfda079041c',
  'knplabs/knp-paginator-bundle' => 'v5.6.0@a11cd180826e9475e1079b3b64c27a1c33c48917',
  'laminas/laminas-code' => '3.4.1@1cb8f203389ab1482bf89c0e70a04849bacd7766',
  'laminas/laminas-eventmanager' => '3.3.1@966c859b67867b179fde1eff0cd38df51472ce4a',
  'laminas/laminas-zendframework-bridge' => '1.3.0@13af2502d9bb6f7d33be2de4b51fb68c6cdb476e',
  'league/html-to-markdown' => '4.10.0@0868ae7a552e809e5cd8f93ba022071640408e88',
  'monolog/monolog' => '2.3.0@df991fd88693ab703aa403413d83e15f688dae33',
  'nikic/php-parser' => 'v4.11.0@fe14cf3672a149364fb66dfe11bf6549af899f94',
  'php-programmist/file-sql-logger-bundle' => 'v1.0.0@7db8f4367397d0f18c2ffa80e433281ab301824d',
  'php-programmist/yandex-turbo-rss-generator-bundle' => 'v1.0.1@1c374325b9d29198788eff1484865dd0dee7f1a8',
  'phpdocumentor/reflection-common' => '2.2.0@1d01c49d4ed62f25aa84a747ad35d5a16924662b',
  'phpdocumentor/reflection-docblock' => '5.2.2@069a785b2141f5bcf49f3e353548dc1cce6df556',
  'phpdocumentor/type-resolver' => '1.4.0@6a467b8989322d92aa1c8bf2bebcc6e5c2ba55c0',
  'ps/image-optimizer' => '2.0.4@9f9e8ccc617d3c1b5034a659bc2c1c14a6de2647',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.1.1@8622567409010282b7aeebe4bb841fe98b58dcaf',
  'psr/event-dispatcher' => '1.0.0@dbefd12671e8a14ec7f180cab83036ed26714bb0',
  'psr/http-message' => '1.0.1@f6561bf28d520154e4b0ec72be95418abe6d9363',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.4@d49695b909c3b7628b6289db5479a1c204601f11',
  'ralouphie/getallheaders' => '3.0.3@120b605dfeb996808c31b6477290a714d356e822',
  'sensio/framework-extra-bundle' => 'v5.6.1@430d14c01836b77c28092883d195a43ce413ee32',
  'symfony/asset' => 'v5.1.11@54a42aa50f9359d1184bf7e954521b45ca3d5828',
  'symfony/cache' => 'v5.1.11@6def7595e74b4b0a6b515af964792e2d092f056d',
  'symfony/cache-contracts' => 'v2.4.0@c0446463729b89dd4fa62e9aeecc80287323615d',
  'symfony/config' => 'v5.1.11@96cc8f6e3b2dccf471b0816df8e421142dc74c18',
  'symfony/console' => 'v5.1.11@d9a267b621c5082e0a6c659d73633b6fd28a8a08',
  'symfony/dependency-injection' => 'v5.1.11@176e622d476133152a9346b0fbd8fb9b60ff6fb3',
  'symfony/deprecation-contracts' => 'v2.4.0@5f38c8804a9e97d23e0c8d63341088cd8a22d627',
  'symfony/doctrine-bridge' => 'v5.1.11@290deda49060e6694f151ac4aa889467935ee3ea',
  'symfony/dotenv' => 'v5.1.11@783f12027c6b40ab0e93d6136d9f642d1d67cd6b',
  'symfony/error-handler' => 'v5.1.11@c2bdf8d374de3f33c525460929f82a9902f6e1c5',
  'symfony/event-dispatcher' => 'v5.1.11@c00f3aae24577a991ae97d34c7033b2e84f1cfa0',
  'symfony/event-dispatcher-contracts' => 'v2.4.0@69fee1ad2332a7cbab3aca13591953da9cdb7a11',
  'symfony/expression-language' => 'v5.1.11@13a16b1cc6e4fd4998631bfdf568d47e48844ec1',
  'symfony/filesystem' => 'v5.1.11@262d033b57c73e8b59cd6e68a45c528318b15038',
  'symfony/finder' => 'v5.1.11@196f45723b5e618bf0e23b97e96d11652696ea9e',
  'symfony/flex' => 'v1.13.3@2597d0dda8042c43eed44a9cd07236b897e427d7',
  'symfony/form' => 'v5.1.11@b794bed839f11bcee9a9f30daa5cb88d311dd409',
  'symfony/framework-bundle' => 'v5.1.11@b40931adcd8386901a65b472d8ba9f34cac80070',
  'symfony/google-mailer' => 'v5.1.11@e93f9d09b1cf02ce74d65c08c2ddda33a0b284ef',
  'symfony/http-client' => 'v5.1.11@82f87fa4b738977937803ab8d52948d490047564',
  'symfony/http-client-contracts' => 'v2.4.0@7e82f6084d7cae521a75ef2cb5c9457bbda785f4',
  'symfony/http-foundation' => 'v5.1.11@1c1920364e205f9aab12457e52b884ebd198b885',
  'symfony/http-kernel' => 'v5.1.11@1b57aaf3215c4313fec1409afdb5046dcb201d17',
  'symfony/intl' => 'v5.1.11@930f17689729cc47d2ce18be21ed403bcbeeb6a9',
  'symfony/mailer' => 'v5.1.11@3c7ab7a402acdb453dcdd6e0b2982caacfcc9b9f',
  'symfony/mime' => 'v5.1.11@d7d899822da1fa89bcf658e8e8d836f5578e6f7a',
  'symfony/monolog-bridge' => 'v5.1.11@ce37f72dd09e38d65dd6d57a0c17e874c4c689a5',
  'symfony/monolog-bundle' => 'v3.7.0@4054b2e940a25195ae15f0a49ab0c51718922eb4',
  'symfony/notifier' => 'v5.1.11@c2ccb5b6f9b7a316b3bfefc5fec751540d620d3c',
  'symfony/options-resolver' => 'v5.1.11@c67e38bab7b561a65e34162a48ae587750f7ae0e',
  'symfony/orm-pack' => 'v2.1.0@357f6362067b1ebb94af321b79f8939fc9118751',
  'symfony/polyfill-intl-grapheme' => 'v1.23.0@24b72c6baa32c746a4d0840147c9715e42bb68ab',
  'symfony/polyfill-intl-icu' => 'v1.23.0@4a80a521d6176870b6445cfb469c130f9cae1dda',
  'symfony/polyfill-intl-idn' => 'v1.23.0@65bd267525e82759e7d8c4e8ceea44f398838e65',
  'symfony/polyfill-intl-normalizer' => 'v1.23.0@8590a5f561694770bdcd3f9b5c69dde6945028e8',
  'symfony/polyfill-mbstring' => 'v1.23.0@2df51500adbaebdc4c38dea4c89a2e131c45c8a1',
  'symfony/polyfill-php73' => 'v1.23.0@fba8933c384d6476ab14fb7b8526e5287ca7e010',
  'symfony/polyfill-php80' => 'v1.23.0@eca0bf41ed421bed1b57c4958bab16aa86b757d0',
  'symfony/polyfill-uuid' => 'v1.23.0@9165effa2eb8a31bb3fa608df9d529920d21ddd9',
  'symfony/process' => 'v5.1.11@d279ae7f2d6e0e4e45f66de7d76006246ae00e4d',
  'symfony/property-access' => 'v5.1.11@d99f6d52333d0798a3b5bb3a81bae789e96bae93',
  'symfony/property-info' => 'v5.1.11@d4981d21891987fce806fc94e41312fe9c131747',
  'symfony/proxy-manager-bridge' => 'v5.1.11@fd6bb40190b1719abbe831be09adf38e0744d5f5',
  'symfony/routing' => 'v5.1.11@e7f71f5da6af8b238f2257670fd6aa4ae6263826',
  'symfony/security-bundle' => 'v5.1.11@911f6b515d515c12a4aea749b6ac688050b6a85c',
  'symfony/security-core' => 'v5.1.11@33a6d376ef0502f18bc498a076590372685f6e89',
  'symfony/security-csrf' => 'v5.1.11@e22ef49d5d3773014942f3dfe301b168a4a833dc',
  'symfony/security-guard' => 'v5.1.11@23e2b838d255f2695a143cf4ad138c58c4dc2918',
  'symfony/security-http' => 'v5.1.11@c3a869cc01640d14ebbbfd03046f494103ffb2fa',
  'symfony/serializer' => 'v5.1.11@76404a1e1a4eaefe94ce12740af1884149d47d96',
  'symfony/serializer-pack' => 'v1.0.4@61173947057d5e1bf1c79e2a6ab6a8430be0602e',
  'symfony/service-contracts' => 'v2.4.0@f040a30e04b57fbcc9c6cbcf4dbaa96bd318b9bb',
  'symfony/stopwatch' => 'v5.1.11@40e7945f2d0f72427eb71b54c26d93d08ef88793',
  'symfony/string' => 'v5.1.11@83bbb92d34881744b8021452a76532b28283dbfb',
  'symfony/translation' => 'v5.1.11@b16d3e4b2d3f78fb2444aa8d19019f033e55ec56',
  'symfony/translation-contracts' => 'v2.4.0@95c812666f3e91db75385749fe219c5e494c7f95',
  'symfony/twig-bridge' => 'v5.1.11@4421afc6e1a0ef5e7cd9b32359617b98069d1666',
  'symfony/twig-bundle' => 'v5.1.11@88e5d5232f11f6db6610d5f4c2380f26e02ce92e',
  'symfony/twig-pack' => 'v1.0.1@08a73e833e07921c464336deb7630f93e85ef930',
  'symfony/uid' => 'v5.1.11@c679017d2c9cf5fffdc6796059c6d85bff63f016',
  'symfony/validator' => 'v5.1.11@c651438e159bdcbe8354320ab627d33fa7e288ff',
  'symfony/var-dumper' => 'v5.1.11@cee600a1248b423330375c869812bdd61a085cd0',
  'symfony/var-exporter' => 'v5.1.11@5aed4875ab514c8cb9b6ff4772baa25fa4c10307',
  'symfony/web-link' => 'v5.1.11@28e6bd9028740602c158f5c6ac8d5e2a2692812e',
  'symfony/webpack-encore-bundle' => 'v1.12.0@9943a59f8551b7a8181e19a2b4efa60e5907c667',
  'symfony/yaml' => 'v5.1.11@6bb8b36c6dea8100268512bf46e858c8eb5c545e',
  'twig/extra-bundle' => 'v3.3.1@e12a8ee63387abb83fb7e4c897663bfb94ac22b6',
  'twig/twig' => 'v3.3.2@21578f00e83d4a82ecfa3d50752b609f13de6790',
  'vich/uploader-bundle' => '1.18.0@c5250c8d6a072960250ce5130e68a5693b3b48dd',
  'webmozart/assert' => '1.10.0@6964c76c7804814a842473e0c8fd15bab0f18e25',
  'dama/doctrine-test-bundle' => 'v6.5.0@a43f79239f446bb85ffa34e799878156a43b590b',
  'myclabs/deep-copy' => '1.10.2@776f831124e9c62e1a2c601ecc52e776d8bb7220',
  'phar-io/manifest' => '2.0.1@85265efd3af7ba3ca4b2a2c34dbfc5788dd29133',
  'phar-io/version' => '3.1.0@bae7c545bef187884426f042434e561ab1ddb182',
  'phpspec/prophecy' => '1.13.0@be1996ed8adc35c3fd795488a653f4b518be70ea',
  'phpunit/php-code-coverage' => '9.2.6@f6293e1b30a2354e8428e004689671b83871edde',
  'phpunit/php-file-iterator' => '3.0.5@aa4be8575f26070b100fccb67faabb28f21f66f8',
  'phpunit/php-invoker' => '3.1.1@5a10147d0aaf65b58940a0b72f71c9ac0423cc67',
  'phpunit/php-text-template' => '2.0.4@5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28',
  'phpunit/php-timer' => '5.0.3@5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2',
  'phpunit/phpunit' => '9.5.6@fb9b8333f14e3dce976a60ef6a7e05c7c7ed8bfb',
  'sebastian/cli-parser' => '1.0.1@442e7c7e687e42adc03470c7b668bc4b2402c0b2',
  'sebastian/code-unit' => '1.0.8@1fc9f64c0927627ef78ba436c9b17d967e68e120',
  'sebastian/code-unit-reverse-lookup' => '2.0.3@ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5',
  'sebastian/comparator' => '4.0.6@55f4261989e546dc112258c7a75935a81a7ce382',
  'sebastian/complexity' => '2.0.2@739b35e53379900cc9ac327b2147867b8b6efd88',
  'sebastian/diff' => '4.0.4@3461e3fccc7cfdfc2720be910d3bd73c69be590d',
  'sebastian/environment' => '5.1.3@388b6ced16caa751030f6a69e588299fa09200ac',
  'sebastian/exporter' => '4.0.3@d89cc98761b8cb5a1a235a6b703ae50d34080e65',
  'sebastian/global-state' => '5.0.3@23bd5951f7ff26f12d4e3242864df3e08dec4e49',
  'sebastian/lines-of-code' => '1.0.3@c1c2e997aa3146983ed888ad08b15470a2e22ecc',
  'sebastian/object-enumerator' => '4.0.4@5c9eeac41b290a3712d88851518825ad78f45c71',
  'sebastian/object-reflector' => '2.0.4@b4f479ebdbf63ac605d183ece17d8d7fe49c15c7',
  'sebastian/recursion-context' => '4.0.4@cd9d8cf3c5804de4341c283ed787f099f5506172',
  'sebastian/resource-operations' => '3.0.3@0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8',
  'sebastian/type' => '2.3.4@b8cd8a1c753c90bc1a0f5372170e3e489136f914',
  'sebastian/version' => '3.0.2@c6c1022351a901512170118436c764e473f6de8c',
  'symfony/browser-kit' => 'v5.1.11@8d0688f6f7c733ff4096d64656c8a3b320d9a1f8',
  'symfony/css-selector' => 'v5.1.11@f65f217b3314504a1ec99c2d6ef69016bb13490f',
  'symfony/debug-bundle' => 'v5.1.11@cc01b42c54ca5a3eed3e48f0c2327e1b3d46c16b',
  'symfony/debug-pack' => 'v1.0.9@cfd5093378e9cafe500f05c777a22fe8a64a9342',
  'symfony/dom-crawler' => 'v5.1.11@5d89ceb53ec65e1973a555072fac8ed5ecad3384',
  'symfony/maker-bundle' => 'v1.33.0@f093d906c667cba7e3f74487d9e5e55aaf25a031',
  'symfony/phpunit-bridge' => 'v5.3.3@d7d3193df3b198f287777b61ef06cd59fdb0516d',
  'symfony/profiler-pack' => 'v1.0.5@29ec66471082b4eb068db11eb4f0a48c277653f7',
  'symfony/test-pack' => 'v1.0.8@d6da9926f785b0c4ebf3b0c6965398aac80e95ce',
  'symfony/web-profiler-bundle' => 'v5.1.11@9a906203efff7df59d1e0185f7aa05e631eb4ef7',
  'theseer/tokenizer' => '1.2.0@75a63c33a8577608444246075ea0af0d052e452a',
  'paragonie/random_compat' => '2.*@7b401389398e46627343b9e7b340b86e9b4c915d',
  'symfony/polyfill-ctype' => '*@7b401389398e46627343b9e7b340b86e9b4c915d',
  'symfony/polyfill-iconv' => '*@7b401389398e46627343b9e7b340b86e9b4c915d',
  'symfony/polyfill-php72' => '*@7b401389398e46627343b9e7b340b86e9b4c915d',
  'symfony/polyfill-php71' => '*@7b401389398e46627343b9e7b340b86e9b4c915d',
  'symfony/polyfill-php70' => '*@7b401389398e46627343b9e7b340b86e9b4c915d',
  'symfony/polyfill-php56' => '*@7b401389398e46627343b9e7b340b86e9b4c915d',
  '__root__' => 'dev-master@7b401389398e46627343b9e7b340b86e9b4c915d',
);

    private function __construct()
    {
    }

    /**
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function rootPackageName() : string
    {
        if (!class_exists(InstalledVersions::class, false) || !(method_exists(InstalledVersions::class, 'getAllRawData') ? InstalledVersions::getAllRawData() : InstalledVersions::getRawData())) {
            return self::ROOT_PACKAGE_NAME;
        }

        return InstalledVersions::getRootPackage()['name'];
    }

    /**
     * @throws OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function getVersion(string $packageName): string
    {
        if (class_exists(InstalledVersions::class, false) && (method_exists(InstalledVersions::class, 'getAllRawData') ? InstalledVersions::getAllRawData() : InstalledVersions::getRawData())) {
            return InstalledVersions::getPrettyVersion($packageName)
                . '@' . InstalledVersions::getReference($packageName);
        }

        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
