<?php

namespace App\Http\Controllers;

use App\Content;
use App\Horoscope;
use Carbon\Carbon;
use App\ZodiacSign;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class ContentsController extends Controller
{
    protected $client;

    protected $zodiacSigns;

    protected $horoscopes;

    public function __construct()
    {
        $this->client = new Client();
        $this->horoscopes = Horoscope::all();
        $this->zodiacSigns = ZodiacSign::all();
    }

    public function http($url)
    {
        $response = $this->client->request('GET', $url);

        return $response->getBody()->getContents();

    }

    public function getZodiacSigns()
    {
        $html = $this->http('http://astro.click108.com.tw/');

        $crawler = new Crawler($html);
        $crawler = $crawler
            ->filter('.STAR12_BOX a')
            ->each(function (Crawler $node, $i) {
                $str = parse_url($node->link()->getUri());
                parse_str($str['query'], $output);

                return [
                    'text' => $node->text(),
                    'url' => $output['RedirectTo'],
                ];
            });

        return $crawler;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $array = [];

        $zodiacSigns = $this->getZodiacSigns();
        foreach ($zodiacSigns as $zodiacSign) {
            $html = $this->http($zodiacSign['url']);

            $crawler = new Crawler($html);
            $crawler = $crawler
                ->filter('.TODAY_CONTENT p')
                ->each(function (Crawler $node, $i) use ($array) {
                    return $node->text();
                });

            $multiplied = collect(array_chunk($crawler, 2))->map(function ($item, $key) {
                return array_combine(
                    [
                        'title',
                        'description',
                        'score'
                    ],
                    [
                        mb_substr($item[0], 0, 4),
                        $item[1],
                        substr_count($item['0'], '★')
                    ]
                );
            });

            $array[] = [
                'date' => Carbon::now()->toDateString(),
                'name' => $zodiacSign['text'],
                'items' => $multiplied->all(),
            ];
        }

        return $array;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($this->create() as $value) {
            foreach ($value['items'] as $item) {
                $content = new Content;
                $content->zodiac_sign_id = $this->getZodiacSignId($value['name']);
                $content->horoscope_id = $this->getHoroscopeId($item['title']);
                $content->score = $item['score'];
                $content->description = $item['description'];

                $content->save();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getZodiacSignId($name)
    {
        return $this->zodiacSigns
                    ->firstWhere('name', $name)
                    ->id;
    }

    public function getHoroscopeId($name)
    {
        return $this->horoscopes
                    ->firstWhere('name', $name)
                    ->id;
    }
}
