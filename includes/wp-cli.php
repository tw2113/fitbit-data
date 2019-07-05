<?php

namespace tw2113\fitbit;

class ProcessFitBitData extends \WP_CLI_Command {

	public $args;

	public $assoc_args;

	public $type;

	public $data = array();


	public function import( $args, $assoc_args ) {
		$this->args       = $args;
		$this->assoc_args = $assoc_args;
	}

	public function export( $args, $assoc_args ) {
		$this->args       = $args;
		$this->assoc_args = $assoc_args;
	}
}
\WP_CLI::add_command( 'fitbit', __NAMESPACE__ . '\ProcessFitBitData' );
