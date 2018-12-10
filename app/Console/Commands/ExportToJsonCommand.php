<?php
namespace App\Console\Commands;

//use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Console\Command;
use array2xml;
use App;



class ExportToJsonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:json
                            {filename : path for results}
                            {model : name of model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export database to json file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "Exporting all selected models to json file\n";
        
        $model = $this->argument('model');
        $model = 'App\\'.$model;

        $articles = $model::all();
        $jsonData = $articles->toJson(JSON_PRETTY_PRINT);
        $arrayData = $articles->toArray();
        //$xmlData = ArrayToXml::convert($arrayData);
        $xml = new ArrayToXML();
        $xmlData = $xml->buildXML($arrayData);


        echo $jsonData."\n";

        file_put_contents("/Users/philliplawniczak/Documents/Studia/SEMESTR III/prac_prog/Project/serialize/save.xml", $xmlData);
        file_put_contents("/Users/philliplawniczak/Documents/Studia/SEMESTR III/prac_prog/Project/serialize/save.json", $jsonData);

        //return $articles->toJson();        
    }
}
