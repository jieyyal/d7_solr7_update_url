<?php
#!/usr/bin/env drush
$env_id = 'acquia_search_server_3';
$environment = apachesolr_environment_load($env_id);
$api = _acquia_search_solr_get_api();
$preferred_index_service = $api->getPreferredIndexService();
$preferred_index = $preferred_index_service->getPreferredIndex();
$create_environment = empty($preferred_index) ? FALSE : TRUE;
$environment['url'] = sprintf('https://%s', $preferred_index['data']['index_url']);
$environment['service_class'] = AcquiaSearchSolrService::class;
apachesolr_environment_save($environment);
