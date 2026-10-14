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


## [2.7.1] - 2026-10-13
### Corrigido
- Dark mode nos containers de conteúdo: `.hentry` (card do post com título+resumo+thumb),
  `.secondary`, `.site-header`, `.site-footer`, `.page-header`, `.page-content`,
  `.comments-area`, `.post-navigation`, `.pagination` e `.widecolumn` agora escurecem
  (`#1f1f1f`) — antes continuavam brancos por regras base do Twenty Fifteen (`#fff`).
- Inputs em foco escuros com borda `#8ab4f8`; `mark`/`ins` em âmbar legível;
  badge `.sticky-post` e botões de paginação/calendário invertidos.

[2.7.1]: https://github.com/Amiell3/newsinside-twentyfifteen/releases/tag/v2.7.1

## [2.7.3] / [2.7.4] - 2026-10-13
### Adicionado
- Seletores **Light Side / DarkSide** abaixo do site-description (admin-only durante preview):
  alternam dark instantaneamente via JS + persistência em localStorage.
### Corrigido
- Contraste WCAG AA: `.entry-footer` `#f7f7f7→#262626`; metadados `#c8c8c8`; links `#a3c9ff`;
  figcaption, imprint, hr, dropdown, botões; embeds GitHub (bfg) com fundo branco inline do
  plugin cobertos por seletor de atributo `div[id^="bfg-wrap-"]` + `!important`.
- Auditoria automatizada de contraste: 0 problemas em home/archive/single.
- Testes responsivos 320/375/768/1440/1920px: sem overflow ou cortes.

## [2.7.5] - 2026-10-13
### Alterado
- Grafia do botão: "DarkSide" → "Dark Side".
- Cores representativas: Light Side = fundo branco; Dark Side = fundo `#1a1a1a`;
  estado ativo com anel (box-shadow) em vez de preenchimento.
- Botão Continuar Lendo no dark: azul → `#e6e6e6` com texto escuro (14.8:1);
  hover `#fff`. Light mode inalterado (`#333`/`#fff`).

## [2.7.6] / [2.7.7] - 2026-10-13
### Corrigido
- Ícones Genericons no dark: `.dropdown-toggle` `#333→#e6e6e6` (invisível antes); hover invertido
  (fundo claro, ícone escuro); metadados e navegações com cores legíveis; regra hover antiga removida.
### Adicionado
- Persistência Light/Dark Side: cookie `ni-theme` (1 ano) + localStorage; `functions.php` aplica
  server-side → sem flash de tema errado. Verificado com reloads nos dois sentidos.

## Nota de diagnóstico — 13/10/2026 (sem mudança de arquivo)
### wptelegram-ajax-widget não carregava (iframe em branco)
- **Causa raiz (fora do tema):** plugin WP Telegram Widget v2.2.16 configurado com
  "Telegram blocked = Sim" + proxy Google Apps Script encerrado pelo Google (HTTP 403).
  A resposta vazia ficou presa no transient de cache (renovando vazio a cada hora) —
  o endpoint `/wptelegram/widget/view/@username/` devolvia 0 bytes.
- **Fix aplicado (DB do WP):** `telegram_blocked` → `0`; transients vazios apagados.
  O servidor da Locaweb alcança `t.me/s/` diretamente (200 OK).
- **Limitação do Telegram:** o widget exibe feed público apenas de **canais**.
  `@newsinsidechat` é **grupo** → carrega a moldura, mas sem mensagens.
  `@newsinside` (canal) carrega as 301 mensagens normalmente.

## [2.7.8] - 2026-10-13
### Adicionado
- Compatibilidade AdSense (Auto Ads via Site Kit): meta `color-scheme` (light dark) no
  `header.php`; `color-scheme: dark` computado quando `body.ni-dark` ativo — os slots
  `<ins.adsbygoogle>` herdam o scheme e o Google serve anúncios na cor do tema.
- `.google-auto-placed { max-width: 100% }` (slots nunca estouram a coluna).
### Verificado
- 9 slots auto-injetados, 2 renderizando 893×280 full-width, sem overflow, no light e
  no dark; anúncios permanecem visíveis com dark ativo.

## Nota de ambiente — 13/10/2026 (PHP 8.3 → 8.5)
### Hospedagem Locaweb atualizou o PHP para 8.5.7
- **Efeito colateral:** dois avisos `Deprecated: ob_end_flush(): Producing output from
  user output handler` estampavam `<br><b>Deprecated</b>` no INÍCIO do HTML de todas as
  páginas públicas — emitidos pelos output handlers do WP Super Cache (`wp_cache_ob_callback`)
  e Optimization Detective (`od_buffer_output`) no shutdown (PHP 8.5 deprecou
  handlers que produzem output; ambos plugins já estão na última versão, sem fix upstream).
- **Causa-raiz da visibilidade:** `WP_DEBUG` estava `true` **sem** `WP_DEBUG_DISPLAY`/`WP_DEBUG_LOG`
  definidos → o wp-settings reativava display de erros DEPOIS de qualquer `ini_set` no wp-config.
- **Fix (wp-config.php, fora do tema):** `WP_DEBUG_LOG = true` (erros vão para debug.log)
  + `WP_DEBUG_DISPLAY = false`. Páginas públicas, feed, REST e resultados de busca agora
  começam 100% limpos em `<!DOCTYPE html>`.
- Residual conhecido: 1 deprecated no `/wp-login.php` (página de admin, sem impacto público/SEO).
- Tema v2.7.8 compatível com PHP 8.5: nenhum uso de recursos removidos (testado: home,
  single, archive, search, feed, widget REST — todos 200 sem warnings do tema).

## [2.7.9] - 2026-10-13
### Adicionado
- Transição suave na troca Light/Dark Side (sem flashbang): classe `ni-theme-anim` só
  durante a troca (550ms), transições 0.45s em bg/cor/borda/sombra de todos os elementos;
  respeita `prefers-reduced-motion`.
- Toggle mobile (≤59.68em): alvo de toque 44px mínimo, borda 2px, larguras iguais,
  anel ativo com sombra, margens sem colisão com "Menu and widgets".
- Desktop: posição inalterada (abaixo do site description).
### Verificado
- 375px: 125×44px por botão, visível sem scroll, sem overflow; 320px: 102×57px cliques OK;
  1280px: mesma posição; animação computada em 0.45s e removida após a troca.

## [2.7.10] - 2026-10-13
### Corrigido
- Tipografia do botão "Continuar lendo": Noto Serif 16px (herdada do corpo) → **Noto Sans
  14px/700 uppercase** com letter-spacing 0.08em — mesma TTF dos demais botões do tema.
  Desktop 213×36px; mobile 320px quebra em 2 linhas sem overflow.

## [2.7.11] / [2.7.12] - 2026-10-13
### Corrigido
- Botão "Continuar lendo" colado no rodapé do card (0px de respiro): agora
  `.entry-excerpt`/`.entry-summary` têm padding-bottom 32px (desktop) / 24px (mobile);
  CTA com margin-top 1.25em; foco visible com outline #8ab4f8 (4ª pista de clique).
  Respiro final: 40px desktop / 32px mobile. v2.7.12 = cache-bust.

## [2.7.13] - 2026-10-13
### Corrigido
- Label do CTA: "Continuar lendo →" (visual) sem os 7-23 tabs de whitespace que vazavam
  do template PHP; título do post só para leitores de tela (span.screen-reader-text).
- Inline styles de margem removidos do index.php; viraram regra CSS
  (.entry-excerpt: margin 8px 32px desktop / 8px 24px mobile + respiro 32/24px).

## [2.7.14] - 2026-10-13
### Corrigido
- Anti-CLS nas thumbs (Firefox Android): .post-thumbnail com aspect-ratio 743/292,
  overflow hidden e bg branco; img com aspect-ratio + object-fit cover. O espaço da
  imagem é reservado no primeiro paint — corrige a "faixa do fundo acima da thumb"
  causada por lazy+srcset/sizes=auto (Optimization Detective) no Gecko Android.

## [2.7.15] - 2026-10-13
### Adicionado
- Menu lateral (guia de sidebars; .ni-theme-toggle intocado): hover/focus-visible em
  todos os itens (antes invisíveis); scroll independente do painel no desktop
  (max-height calc(100vh-220px), overflow-y auto); seta do toggle girando 45° quando
  aberto; hierarquia de submenu com guia lateral + 14px; dark mode com hover invertido.

## [2.7.16] - 2026-10-13
### Adicionado
- Sidebar no intervalo do guia (240-300px): 21.4286% + max-width 300px, grid float
  compensado em par (site-content margin-left 21.4286% / width 78.5714%).
  Medido: 216/271/300px em 1024/1280/1440+, cards 661-919px, sem overflow.
- Seção ativa em destaque: current-menu-item/ancestor com fundo suave + bold 700
  (+ variante dark), trilha pai+filho verificada na categoria PS5.
### Não aplicados (guia de app, não de blog)
- Troca de contas, sidebar secundária, resize arrastável, busca embutida,
  ações inline, modo colapsado 48-64px.

## [2.7.17] - 2026-10-13
### Corrigido (regressões apontadas no print, dark/desktop)
- Botões Light/Dark Side esticados (77x57): flex 1 1 0 estava no BASE (deveria ser
  só mobile) + sidebar estreita da v2.7.16 → rótulo quebrava em 2 linhas. Desktop
  volta a inline-block + nowrap: 111x36/107x36 (altura original); mobile 125x44
  intocado.
- Quebra masthead→secondary: #masthead margin-bottom 12px (v2.6.5) vazava fundo
  rgb(20,20,20) entre os painéis no dark. Agora 0 (o border-bottom do site-header
  separa). Gap medido: 0px.

## [2.7.18] / [2.7.19] - 2026-10-13
### Corrigido
- Quebras de cor da sidebar (light e dark): body::before (% do viewport) e .sidebar
  (% do .site + max-width 300) dessincronizavam em telas >=1440px — conteúdo fora da
  faixa, fundo da página vazando. MQ 87.6875em recalculada p/ geometria atual
  (calc(50% - 401.5px)) e movida p/ o fim da cascata. Faixa == borda da sidebar em
  1024/1280/1440/1600/1920 (sobra 0). v2.7.19 = cache-bust.

## [2.7.20] - 2026-10-14
### Corrigido
- Fresta branca de 1-2px nos cantos das thumbs (visível no dark): wrapper e img
  tinham aspect-ratio 743/292 independentes e arredondavam alturas em direções
  opostas, expondo o background #fff. Img agora preenche o wrapper exato
  (height/width 100% + object-fit cover + display block; wrapper line-height 0);
  dark com background #1f1f1f no wrapper. Gap 0 medido em Chromium e Gecko.

## [2.7.21] - 2026-10-14
### Corrigido
- Fresta residual de antialias nos cantos das thumbs (2º reporte): o gap 0.00 da
  v2.7.20 não cobria a 1ª linha PARCIAL da img em tops fracionários (91.85px) — o
  Gecko misturava o canto com o bg do wrapper. Pixel bleed: img sangra 1px/lado
  (calc(100% + 2px), margin -1px), o overflow:hidden corta; cantos rasterizados
  são amostra pura da imagem. Validado no Gecko 1440 dark/light.
