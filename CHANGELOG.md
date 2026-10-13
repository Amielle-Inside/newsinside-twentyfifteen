# Changelog

Todas as mudanças notáveis deste fork são documentadas aqui.
Formato baseado em [Keep a Changelog](https://keepachangelog.com/pt-BR/1.1.0/);
versionamento semântico adaptado ao tema (2.6.x = correções, 2.7 = feature).

## [2.7.0] - 2026-10-13
### Adicionado
- Dark mode completo (bloco `[NI DARK MODE]` no `style.css`): paleta `#141414`/`#1f1f1f`/`#e6e6e6`,
  links `#8ab4f8`, botões invertidos, formulários/scrollbar/`::selection` estilizados,
  logo com `brightness(1.15)`. Contraste WCAG AA/AAA verificado.
- Hook `ni_dark_mode_admin_preview` (`functions.php`): classe `body.ni-dark` injetada apenas
  para administradores logados — preview privado do dark mode antes do lançamento público.

## [2.6.5] - 2026-10-12
### Alterado
- `#masthead { margin-bottom: 12px }` (antes ~74px via `7.6923%`): `.site-branding` aproximado
  do `#secondary` conforme solicitado.

## [2.6.4] - 2026-10-12
### Corrigido
- Letterbox nas thumbnails: `.post-thumbnail img` agora `width: 100%; height: auto` —
  imagens destacadas preenchem a largura do post sem faixas laterais.

## [2.6.3] - 2026-10-12
### Corrigido
- Tamanho do botão "Continuar lendo": recalibrado para a escala rem real do tema
  (`html` em `62.5%`, 1rem=10px). Botão renderiza a 16px de fonte (195×42px) contra
  9-10px antes. Padding/sombra/hover ajustados.

## [2.6.2] - 2026-10-12
### Alterado
- Botão "Continuar lendo" ampliado (primeira tentativa, ainda fora da escala rem correta).
- `functions.php`: versão do stylesheet passa de hardcoded `'20190507'` para
  `wp_get_theme()->get('Version')` — cache-bust automático a cada release.

## [2.6.1] - 2026-10-12
### Adicionado
- **Fork derivado** do tema customizado `1a1a1a1aa1amido/twentyfifteen` (que por sua vez
  deriva do Twenty Fifteen do WordPress).
- Botão "Continuar lendo" em TODOS os posts das listagens:
  - `index.php`: bloco `ni-continue-reading` após `the_excerpt()` no loop inline da home.
  - `content.php`: resumo + botão garantidos em arquivos/categorias (single preservado).
  - `content-search.php`: botão nos resultados de busca.
- CSS do botão (bloco `[NI 2026-10-12]` no `style.css`) e header do tema renomeado
  para "NewsInside Twenty Fifteen+".

[2.7.0]: https://github.com/Amiell3/newsinside-twentyfifteen/releases/tag/v2.7.0
[2.6.5]: https://github.com/Amiell3/newsinside-twentyfifteen/releases/tag/v2.6.5
[2.6.4]: https://github.com/Amiell3/newsinside-twentyfifteen/releases/tag/v2.6.4
[2.6.3]: https://github.com/Amiell3/newsinside-twentyfifteen/releases/tag/v2.6.3
[2.6.2]: https://github.com/Amiell3/newsinside-twentyfifteen/releases/tag/v2.6.2
[2.6.1]: https://github.com/Amiell3/newsinside-twentyfifteen/releases/tag/v2.6.1
