<?php

namespace UON\Endpoint;

use UON\Client;

/**
 * Class Leads
 * @package UON
 */
class Leads extends Client
{
    /**
     * Create new lead
     *
     * @link    https://api.u-on.ru/{key}/lead/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create(array $parameters)
    {
        $endpoint = '/lead/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get leads data by client ID
     *
     * @link    https://api.u-on.ru/{key}/lead-by-client/{id}.{_format}
     * @param   int $id - Unique lead ID
     * @return  array|false
     */
    public function getByClient($id)
    {
        $endpoint = '/lead-by-client/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get lead by ID
     *
     * @link    https://api.u-on.ru/{key}/lead/{id}.{_format}
     * @param   int $id - Unique lead ID
     * @return  array|false
     */
    public function get($id)
    {
        $endpoint = '/lead/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get all leads into dates range (and by sources if needed)
     *
     * @link    https://api.u-on.ru/{key}/lead/{date_from}/{date_to}.{_format}
     * @param   string $date_from
     * @param   string $date_to
     * @param   int $source_id - Source ID, eg ID of SMS or JivoSite
     * @param   null|int $page
     * @return  array|false
     */
    public function getByDateAndSource($date_from, $date_to, $source_id, $page = null)
    {
        $endpoint = '/leads/' . $date_from . '/' . $date_to . '/' . $source_id;
        if (!empty($page))
            $endpoint .= '/' . $page;

        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get all leads into dates range.
     *
     * @link    https://api.u-on.ru/{key}/leads/{date_from}/{date_to}/{page}.{_format}
     * @param   string $date_from
     * @param   string $date_to
     * @param   null|int $page
     * @return  array|false
     */
    public function getByDate($date_from, $date_to, $page = null)
    {
        $endpoint = '/leads/' . $date_from . '/' . $date_to;
        if (!empty($page))
            $endpoint .= '/' . $page;

        return $this->doRequest('get', $endpoint);
    }

    /**
     * Search leads by filters.
     *
     * @link    https://api.u-on.ru/{key}/lead/search.{_format}
     * @param   array $parameters
     * @return  array|false
     */
    public function search(array $parameters)
    {
        $endpoint = '/lead/search';

        return $this->doRequest('post', $endpoint, $parameters);
    }

}
