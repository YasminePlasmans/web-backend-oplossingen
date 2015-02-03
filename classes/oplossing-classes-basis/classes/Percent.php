<?php

	class Percent
	{

		private	$rawPercent	=	0;

		public $absolute	=	0;
		public $relative	=	0;
		public $hundred		=	0;
		public $nominal		=	'';

		public function __construct( $new, $unit )
		{
			$this->rawPercent	=	$new / $unit;

			$this->absolute	=	$this->rawPercent;
			$this->absolute	=	$this->formatNumber( $this->absolute );

			$this->relative	=	$this->rawPercent - 1;
			$this->relative	=	$this->formatNumber( $this->relative );

			$this->hundred	=	$this->rawPercent * 100;
			$this->hundred	=	$this->formatNumber( $this->hundred );

			if ($this->rawPercent > 1 )
			{
				$this->nominal = 'positive';
			}
			else if ($this->rawPercent < 1 )
			{
				$this->nominal = 'negative';
			}
			else
			{
				$this->nominal = 'status-quo';
			}
		}

		private function formatNumber( $number )
		{
			$formatted	=	number_format( $number, 2 );

			return $formatted;
		}

	}

?>