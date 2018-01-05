/**
 * Side-drawer-type menuing with Slideout
 * @see https://slideout.js.org/
 */
import $ from 'jquery'
import Slideout from 'slideout'

$(() => {
  let $fixed = $('.fixed-top').add('.fixed-bottom').add('[data-slideout-fixed]')

  let styleFixed = (prop, value) => {
    $fixed.each((i, el) => {
      el.style[prop] = value
    })
  }

  $('[data-toggle="slideout"]').each((i, el) => {
    let $btn = $(el)
    let $menu = $($btn.attr('href') || $btn.data('slideout-menu'))
    let $panel = $($menu.data('slideout-panel') || 'main')

    let slideout = new Slideout({
      panel: $panel[0],
      menu: $menu[0]
    })

    $panel.click(() => slideout.isOpen() && slideout.close())

    slideout.on('translate', (translated) => {
      styleFixed('transform', `translateX(${translated}px)`)
    })

    slideout.on('beforeopen', () => {
      styleFixed('transition', 'transform 300ms ease')
      styleFixed('transform', 'translateX(256px)')
    })

    slideout.on('beforeclose', () => {
      styleFixed('transition', 'transform 300ms ease')
      styleFixed('transform', 'translateX(0px)')
    })

    slideout.on('open', () => {
      styleFixed('transition', '')
    })

    slideout.on('close', () => {
      styleFixed('transition', '')
    })

    $btn.click(() => slideout.toggle())
  })
})
