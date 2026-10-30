<?php

namespace App\Traits;

trait HasTranslations
{
    /**
     * Get translated attribute value or fall back to original attribute.
     */
    public function trans(string $field, ?string $locale = null): ?string
    {
        $locale = $locale ?: app()->getLocale();
        $translations = $this->translations ?? [];

        if (is_string($translations)) {
            $translations = json_decode($translations, true) ?: [];
        }

        if (isset($translations[$locale][$field]) && ! empty($translations[$locale][$field])) {
            return $translations[$locale][$field];
        }

        // Return base attribute if translation not found
        return $this->{$field} ?? null;
    }
}
