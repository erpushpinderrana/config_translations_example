# Drupal Config Translation Example - Module
The Configuration Translation module (part of Drupal Core in Drupal 9) allows configuration to be translated into different languages. Whenever there are custom configurations, then it relies on having a correct configuration schema to provide translations. So, every module must provide a correct schema. This is just an example module to get an idea of how can we achieve it through a custom module.

## How to get config translation
[Translated Config](https://www.drupal.org/project/translated_config) is necessary as Drupal Core does not provide a way to get one complete dataset of configuration in a specified language.

```
\Drupal::service('translated_config.helper')->getTranslatedConfig('system.site','de')->get('name');
```

## References
https://www.drupal.org/docs/multilingual-guide/translating-configuration
https://www.drupal.org/docs/user_guide/en/language-config-translate.html
https://antistatique.net/en/blog/drupal-8-how-to-translate-the-config-api
https://www.drupal.org/docs/drupal-apis/configuration-api/configuration-schemametadata
