<?php

namespace joshtronic;

class LoremIpsum
{
	private $first            = true;
	private $sentence_mean    = 24.46;
	private $sentence_stdev   = 5.08;
	private $paragraph_mean   = 5.8;
	private $paragraph_stdev  = 1.93;

	public $words = array(
		// Lorem ipsum...
		'lorem',        'ipsum',       'dolor',        'sit',
		'amet',         'consectetur', 'adipiscing',   'elit',
		// The rest of the vocabulary
		'a',            'ac',          'accumsan',     'ad',
		'aenean',       'aliquam',     'aliquet',      'ante',
		'aptent',       'arcu',        'at',           'auctor',
		'augue',        'bibendum',    'blandit',      'class',
		'commodo',      'condimentum', 'congue',       'consequat',
		'conubia',      'convallis',   'cras',         'cubilia',
		'cum',          'curabitur',   'curae',        'cursus',
		'dapibus',      'diam',        'dictum',       'dictumst', 
		'dignissim',    'dis',         'donec',        'dui',
		'duis',         'egestas',     'eget',         'eleifend',
		'elementum',    'enim',        'erat',         'eros',
		'est',          'et',          'etiam',        'eu',
		'euismod',      'facilisi',    'facilisis',    'fames',
		'faucibus',     'felis',       'fermentum',    'feugiat',
		'fringilla',    'fusce',       'gravida',      'habitant',
		'habitasse',    'hac',         'hendrerit',    'himenaeos',
		'iaculis',      'id',          'imperdiet',    'in',
		'inceptos',     'integer',     'interdum',     'justo',
		'lacinia',      'lacus',       'laoreet',      'lectus',
		'leo',          'libero',      'ligula',       'litora',
		'lobortis',     'luctus',      'maecenas',     'magna',
		'magnis',       'malesuada',   'massa',        'mattis',
		'mauris',       'metus',       'mi',           'molestie',
		'mollis',       'montes',      'morbi',        'mus',
		'nam',          'nascetur',    'natoque',      'nec',
		'neque',        'netus',       'nibh',         'nisi',
		'nisl',         'non',         'nostra',       'nulla',
		'nullam',       'nunc',        'odio',         'orci',
		'ornare',       'parturient',  'pellentesque', 'penatibus',
		'per',          'pharetra',    'phasellus',    'placerat',
		'platea',       'porta',       'porttitor',    'posuere',
		'potenti',      'praesent',    'pretium',      'primis',
		'proin',        'pulvinar',    'purus',        'quam',
		'quis',         'quisque',     'rhoncus',      'ridiculus',
		'risus',        'rutrum',      'sagittis',     'sapien',
		'scelerisque',  'sed',         'sem',          'semper',
		'senectus',     'sociis',      'sociosqu',     'sodales',
		'sollicitudin', 'suscipit',    'suspendisse',  'taciti',
		'tellus',       'tempor',      'tempus',       'tincidunt',
		'torquent',     'tortor',      'tristique',    'turpis',
		'ullamcorper',  'ultrices',    'ultricies',    'urna',
		'ut',           'varius',      'vehicula',     'vel',
		'velit',        'venenatis',   'vestibulum',   'vitae',
		'vivamus',      'viverra',     'volutpat',     'vulputate',
	);

	public function word($tags = false)
	{
		return $this->words(1, $tags);
	}

	public function wordsArray($count = 1, $tags = false)
	{
		return $this->words($count, $tags, true);
	}

	public function words($count = 1, $tags = false, $array = false)
	{
		$words = array();

		if ($this->first)
		{
			if ($count > 8)
			{
				$start  = 8;
				$count -= 8;
			}
			else
			{
				$start = $count;
				$count = 0;
			}

			$words       = array_slice($this->words, 0, $start);
			$this->first = false;
		}

		if ($count)
		{
			shuffle($this->words);
			$words += array_slice($this->words, 0, $count);
		}

		if ($tags)
		{
			$this->markup($words, $tags);
		}

		if (!$array)
		{
			$words = implode(' ', $words);
		}

		return $words;
	}

	public function sentence()
	{

	}

	public function sentences()
	{

	}

	public function sentencesArray()
	{

	}

	public function paragraph()
	{

	}

	public function paragraphs()
	{

	}

	public function paragraphsArray()
	{

	}

	private function markup(&$strings, $tags)
	{
		if (!is_array($tags))
		{
			$tags = array($tags);
		}
		else
		{
			$tags = array_reverse($tags);
		}

		foreach ($strings as $key => $string)
		{
			foreach ($tags as $tag)
			{
				if ($tag[0] == '<')
				{
					$string = str_replace('$1', $string, $tag);
				}
				else
				{
					$string = sprintf('<%1$s>%2$s</%1$s>', $tag, $string);
				}

				$strings[$key] = $string;
			}
		}
	}
}

?>
