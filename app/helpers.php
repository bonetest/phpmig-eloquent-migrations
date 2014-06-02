<?php

function getDsn(array $config)
{
		extract($config);

		return isset($config['port'])
                        ? "{$driver}:host={$host};port={$port};dbname={$database}"
                        : "{$driver}:host={$host};dbname={$database}";
}
