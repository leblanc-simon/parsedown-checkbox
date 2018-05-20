<?php
/**
 * This file is part of the ParsedownCheckbox package.
 *
 * (c) Simon Leblanc <contact@leblanc-simon.eu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class ParsedownCheckbox extends ParsedownExtra
{
    const VERSION = '0.1.0';
  protected function blockListComplete(array $block)
  {
    if (null === $block) {
      return null;
    }
    if (!(isset($block['element']) && ($block['element']['name'] === 'ul') && is_array($block['element']['elements']))
    ) {
      return $block;
    }

    foreach ($block['element']['elements'] as &$element) {
      if (!isset($element['handler']['argument'][0])){
        continue;
      }
      $begin_line = substr(trim($element['handler']['argument'][0]), 0, 4);
      $re = '/.*(\s{2,})$/';
      if ('[ ] ' === $begin_line) {
        if(preg_match_all($re, $element['handler']['argument'][0], $matches, PREG_SET_ORDER, 0) > 0){
          $element['handler']['argument'][0] = trim($element['handler']['argument'][0]) . '<br>';
        }
        $element['handler']['argument'][0] = '<input type="checkbox" disabled /> '. substr($element['handler']['argument'][0], 4);
        unset ($element['name']);

      } elseif ('[x] ' === $begin_line) {
        if(preg_match_all($re, $element['handler']['argument'][0], $matches, PREG_SET_ORDER, 0) > 0){
          $element['handler']['argument'][0] = trim($element['handler']['argument'][0]) . '<br>';
        }
        $element['handler']['argument'][0] = '<input type="checkbox" checked disabled /> '. substr($element['handler']['argument'][0], 4);
        unset ($element['name']);
      }
    }
    unset($element);
    unset ($block['element']['name']);

    return $block;
  } 
}

