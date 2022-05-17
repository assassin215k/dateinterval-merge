<?php

/**
 * @param array $input
 *
 * @return array
 */
function merge(array $input): array
{
    $result = [];
    while (true) {
        $dates = array_shift($input);

        if (is_null($dates)) {
            break;
        }

        $updated = false;

        foreach ($result as &$item) {
            if ($dates[1] < $item[0] || $dates[0] > $item[1]) {
                continue;
            }

            if ($dates[0] < $item[0]) {
                $item[0] = $dates[0];
            }

            if ($dates[1] > $item[1]) {
                $item[1] = $dates[1];
            }

            $updated = true;
            break;
        }

        if (!$updated) {
            $result[] = $dates;
        }
    }

    return $result;
}
