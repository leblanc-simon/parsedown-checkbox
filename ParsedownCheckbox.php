<?php
/**
 * This file is part of the ParsedownCheckbox package.
 *
 * (c) Simon Leblanc <contact@leblanc-simon.eu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Update for ParsedownExtra version 0.8.0-beta-1 by ms502040 <mira@neyowo.com>
 *
 * If you don't want points before checkbox add to style:
 *   .task-list-item {
 *     list-style-type: none;
 *   }
 *   .task-list-item-checkbox {
 *     margin: 0 0.2em 0.25em -1.6em;
 *     vertical-align: middle;
 *   }
 */

class ParsedownCheckbox extends ParsedownExtra
{
  const VERSION = '0.1.1';

  /**
   * ParsedownCheckbox constructor.
   *
   * @throws \Exception Incompatible parent version
   */
  function __construct()
  {
    if (version_compare(parent::version, '0.8.0-beta-1', '<')) {
      throw new Exception('ParsedownCheckbox requires a minimum version 0.8.0-beta-1 of ParsedownExtra');
    }

    try {
      ParsedownExtra::__construct();
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

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
      if (!isset($element['handler']['argument'][0])) {
        continue;
      }
      $begin_line = substr(trim($element['handler']['argument'][0]), 0, 4);
      $re = '/.*(\s{2,})$/';
      if ('[ ] ' === $begin_line) {
        if (preg_match_all($re, $element['handler']['argument'][0], $matches, PREG_SET_ORDER, 0) > 0) {
          $element['handler']['argument'][0] = trim($element['handler']['argument'][0]) . '<br>';
        }
        $element['handler']['argument'][0] = '<input type="checkbox" class="task-list-item-checkbox" disabled /> ' . substr($element['handler']['argument'][0], 4);
        $element['attributes'] = array('class' => 'task-list-item');

      } elseif ('[x] ' === $begin_line) {
        if (preg_match_all($re, $element['handler']['argument'][0], $matches, PREG_SET_ORDER, 0) > 0) {
          $element['handler']['argument'][0] = trim($element['handler']['argument'][0]) . '<br>';
        }
        $element['handler']['argument'][0] = '<input type="checkbox" class="task-list-item-checkbox" checked disabled /> ' . substr($element['handler']['argument'][0], 4);
        $element['attributes'] = array('class' => 'task-list-item');
      }
    }
    unset($element);
    $block['element']['attributes'] = array('class' => 'contains-task-list');

    return $block;
  }
}
