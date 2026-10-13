# NewsInside Twenty Fifteen+ (`twentyfifteen-more`)

Fork privado do tema **Twenty Fifteen** para o site [NewsInside.org](https://www.newsinside.org/).
Este repositório espelha o tema ativo em produção (WordPress 7.1.3 / PHP 8.3) e serve como
controle de versão das customizações feitas pela equipe do NewsInside com o Hermes Agent.

## Fontes originais (créditos do fork)

- **Tema base:** [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen/) — WordPress.org / WordPress Team
- **Repositório upstream:** https://github.com/WordPress/twentyfifteen
- **Licença:** GNU General Public License v2 ou posterior (GPL-2.0-or-later)
- O tema base é distribuído com o WordPress e todos os direitos autorais do trabalho original
  pertencem à equipe do WordPress. Este fork mantém a licença GPL-2.0+ e o cabeçalho de créditos
  em `style.css`.
- **Fork intermediário:** o site já usava uma cópia renomeada e customizada de Twenty Fifteen
  (`1a1a1a1aa1amido/twentyfifteen`, alterações de jan/2025 — loop inline na home com excerpts,
  sidebar 413px, customizações visuais). Este fork (`twentyfifteen-more`) deriva DIRETAMENTE
  dessa cópia, herdando todas as suas customizações, e adiciona as modificações listadas abaixo.

## Modificações feitas neste fork (desde a derivação, 12-13/10/2026)

### v2.6.1 — 12/10/2026
**Derivação do fork + botão "Continuar lendo" em todos os posts das listagens**

O Twenty Fifteen original só mostra o link "continue reading" quando o post usa a tag
`<!--more-->` ou possui resumo manual. A home do NewsInside não usava `content.php`
(loop inline customizado em `index.php`), então os posts apareciam SEM botão algum.

- **`index.php`** — injetado bloco `p.ni-continue-reading > a.more-link` após `the_excerpt()`
  no loop inline da home; todos os posts da home passam a exibir o botão.
- **`content.php`** — em listagens (não-single): posts com more/excerpt usam `the_content()`
  com more-link; posts sem resumo usam `the_excerpt()` + bloco `ni-continue-reading`.
  Em single, comportamento original preservado.
- **`content-search.php`** — adicionado bloco `ni-continue-reading` após `the_excerpt()`
  nos resultados de busca (corrigido depois bug de `endif;` sem fechamento `?>`).
- **`style.css`** — header renomeado para "NewsInside Twenty Fifteen+", bloco `[NI 2026-10-12]`
  com estilo do botão (pill escuro, hover, foco, seta `→`).

### v2.6.2 — 12/10/2026
**Botão redimensionado à escala tipográfica do tema (v2 do CSS)**

- **`style.css`** — padding/font-size aumentados; sombra e transição de hover adicionadas.
- **`functions.php`** — versão do enqueue do CSS trocada de hardcoded `'20190507'` para
  `wp_get_theme()->get('Version')`: cache-bust automático a cada bump de versão.

### v2.6.3 — 12/10/2026
**Botão com o tamanho CORRETO na escala rem do tema**

- **`style.css`** — descoberto que Twenty Fifteen usa `html { font-size: 62.5% }` (1rem=10px).
  Botão recalibrado: container `1.6rem` (16px), botão `font-size: inherit`, padding
  `0.55em 1.1em`; media queries `0.9rem` originais removidas. Resultado renderizado:
  195x42px (antes 133x28px com fonte de 9-10px).

### v2.6.4 — 12/10/2026
**Thumbnails full-width (fim do letterbox)**

- **`style.css`** — `.post-thumbnail img { width: 100%; height: auto; }` + border-radius:
  imagens destacadas passam a preencher a largura total do post, eliminando as faixas
  brancas laterais (letterbox) do CSS original `margin: 0 auto`.

### v2.6.5 — 12/10/2026
**Aproximação do cabeçalho da sidebar**

- **`style.css`** — `#masthead { margin-bottom: 12px; }` (antes `7.6923%` ≈ 74px):
  gap entre `.site-branding` e `#secondary` reduzido de 74px para 12px.

### v2.7.0 — 13/10/2026
**Dark mode (preview privado — somente administradores)**

- **`style.css`** — bloco `[NI DARK MODE v2.7.0]`: paleta escura completa (fundo `#141414`,
  painéis `#1f1f1f`, texto `#e6e6e6`, links `#8ab4f8`, metadados `#b8b8b8`), estilização
  de formulários, busca, blockquote, código, tabelas, scrollbar, `::selection`; botão
  Continuar Lendo invertido (azul com texto escuro); logo com `brightness(1.15)`.
  Contraste WCAG verificado: corpo 14.8:1, títulos 16.2:1, metadados 9.3:1, links 8.7:1.
- **`functions.php`** — hook `ni_dark_mode_admin_preview` no filtro `body_class`: classe
  `ni-dark` adicionada ao `<body>` **somente para usuários admin logados** — preview
  privado enquanto o dark mode não é liberado ao público.

## Estrutura

- `style.css` — tema completo (CSS inline + header WP + blocos `[NI]` customizados)
- `functions.php` — setup do tema + fixes Core Web Vitals `[NI 2026-10-12]` + hooks `[NI]`
- `index.php` / `archive.php` / `search.php` / `content*.php` — templates de listagem
- demais arquivos herdados do Twenty Fifteen original sem modificação

## Como o tema chega à produção

1. Edição direta via FTP (Locaweb) em `/public_html/wp-content/themes/1a1a1a1aa1amido/twentyfifteen-more/`
2. Verificação ao vivo (público + admin logado)
3. Commit neste repositório com changelog documentado

## Licença

GPL-2.0-or-later (herdada do Twenty Fifteen / WordPress).
