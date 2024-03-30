<?php
namespace app\services;
use GuzzleHttp\Client;

class ReedJobseekerApiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.reed.co.uk/api/1.0/',
        ]);
        $this->apiKey = getenv('35dc79e1-cdf8-4643-b2b8-1466c6dd3a9b'); // Use your environment variable name here
    }

    public function searchJobs($keywords)
    {
        $response = $this->client->get('search', [
            'query' => [
                'keywords' => $keywords,
                'resultsToTake' => 10,
                'employerId' => 0,
                'permanent' => true,
                'contract' => true,
                'temp' => true,
                'fullTime' => true,
                'partTime' => true,
                'postedByRecruitmentAgency' => true,
                'postedByDirectEmployer' => true,
                'graduate' => true,
                'minimumSalary' => 0,
                'maximumSalary' => 0,
                'postedWithin' => 7,
                'location' => '', // Remove this line if not needed
                'age' => 0,
                'resultsToSkip' => 0,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
