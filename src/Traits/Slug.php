<?php namespace Kjamesy\Utility\Traits;

trait Slug{
    /**
     * Make a unique slug based on existing ones
     * @param array $existingSlugs
     * @param string $proposedSlug
     * @return string
     */
    public static function makeUniqueSlug( $existingSlugs = [], $proposedSlug = '' )
    {
        $exists = false;
        $existingSlug = null;

        foreach ($existingSlugs as $slug) {
            if ($proposedSlug === $slug) {
                $exists = true;
                $existingSlug = $slug;
                break;
            }
        }

        if ($exists) {
            $parts = explode("-", $existingSlug);
            $length = count($parts);
            $lastPart = $parts[$length - 1];
            $newSlug = "";

            if ((int)$lastPart > 0) {
                $allOtherParts = $parts;
                unset($allOtherParts[$length - 1]);
                $allOtherParts[] = (int)$lastPart + 1;

                foreach ($allOtherParts as $key => $part) {
                    if ($key != $length)
                        $newSlug .= $part . "-";
                    else
                        $newSlug .= $part;
                }
            } else {
                $newSlug = $existingSlug . "-1";
            }

            return static::makeUniqueSlug($existingSlugs, $newSlug);
        } else {
            return $proposedSlug;
        }
    }
}