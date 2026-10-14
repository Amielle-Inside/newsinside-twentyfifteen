# NewsInside Twenty Fifteen+ (`twentyfifteen-more`)

Fork público do tema **[Twenty Fifteen](https://wordpress.org/themes/twentyfifteen/)** — o tema default de 2015 do WordPress — mantido para o site [NewsInside.org](https://www.newsinside.org/).

Este repositório espelha o tema ativo em produção (WordPress 7.1.3 / PHP 8.5.7) e é o controle de versões das customizações do NewsInside.

> ⚠️ **Tema em produção:** este código roda no site real do NewsInside. Instale por sua conta; testes de compatibilidade foram feitos apenas no ambiente de produção dele.

## 🤖 Desenvolvido com assistência de agentes de IA

Todas as edições e melhorias deste fork (a partir da v2.6.1, 12/10/2026) foram implementadas com o uso de **agentes de IA**:

- **Agente:** [Hermes Agent](https://hermes-agent.nousresearch.com/) (Nous Research)
- **Modelo:** `z-ai/glm-5.3` (via provider NVIDIA)
- **Automação:** diagnóstico em browser real (pixel a pixel), edição via FTP, versionamento git + GitHub releases, testes em Chromium e Gecko/Firefox (desktop e mobile emulado), medições Core Web Vitals via PerformanceObserver
- **Supervisão humana:** todas as mudanças foram revisadas visualmente pela equipe do NewsInside após cada release; regressões reportadas foram corrigidas nos releases seguintes

## Tema original (créditos do fork)

- **Tema base:** [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen/) — WordPress.org / WordPress Team
- **Código-fonte oficial (SVN):** https://themes.trac.wordpress.org/browser/twentyfifteen — o Twenty Fifteen (2015) **não possui repositório GitHub próprio na org [WordPress](https://github.com/WordPress)** (o espelho oficial deles no GitHub começa no Twenty Sixteen); por isso este é um **repositório próprio**, creditando e linkando a fonte oficial
- **Licença:** GNU General Public License v2 ou posterior (**GPL-2.0-or-later**) — este fork mantém integralmente a licença, os cabeçalhos de crédito em `style.css` e o `readme.txt` original
- Todos os direitos autorais do trabalho original pertencem à equipe do WordPress

## Destaques deste fork

| Recurso | Desde | Detalhe |
|---|---|---|
| 🌙 **Dark mode completo** | v2.7.0+ | Paleta própria, persistência via cookie (sem flash de tema errado), contraste WCAG AA/AAA, transições suaves, `prefers-reduced-motion` respeitado |
| 📖 **Botão "Continuar lendo"** | v2.6.1+ | Em todos os posts das listagens (home, arquivos, busca), tipografia da UI do tema |
| 🏎️ **Rolagem infinita CWV-safe** | v2.7.23 | Vanilla JS 4,5KB, REST nativa, IntersectionObserver — CLS 0.000 medido, zero handlers de scroll; paginação clássica preservada para SEO/no-JS |
| 🔍 **Busca acima da 1ª thumb** | v2.7.24/25 | Alinhada ao pixel com os cards, 44px de alvo de toque, sem zoom-força no iOS |
| 📈 **SEO sem plugin** | v2.7.26 | Canonical nativo em todas as views, `noindex` cirúrgico (tags ≤2 posts, `/page/2+`), sitemap único |
| 🖼️ **Thumbs anti-CLS + pixel bleed** | v2.7.14/20/21 | Espaço reservado antes do load e cantos rasterizados sem fresta (validado em Chromium e Gecko) |
| 🎮 **Easter egg: Konami Code** | v2.7.22 | `↑↑↓↓←→←→BA` (desktop) ou 10 taps (mobile) toca o meme "Fahh" — 50KB baixados só no sucesso |
| 🎯 **Compatibilidade AdSense dark** | v2.7.8/27 | `color-scheme` por tema, slots contidos, CLS 0.11 → 0.000 |

## Core Web Vitals (medições reais, 14/10/2026)

- **LCP:** 576 ms desktop · 852 ms mobile — **CLS:** 0.000 nos dois — **INP:** sem handlers de scroll
- **TTFB:** 193 ms (cache) · HTML 28 KB gzip · **0 scripts render-blocking no `<head>`**

## Estrutura das modificações

Os patches NI ("NewsInside") vivem nos arquivos, marcados com comentários datados `[NI v2.7.x]`:

- `style.css` — header do tema + blocos `[NI ...]` no fim (todas as features visuais/dark)
- `functions.php` — hooks: dark-mode server-side, rolagem infinita, Konami, canonical/noindex, sitemap
- `searchform.php` — busca customizada (novo arquivo)
- `index.php`, `content.php`, `content-search.php` — CTA "Continuar lendo" nas listagens
- `header.php` — meta `color-scheme`, tema claro/escuro
- `assets/fahh-meme.mp3` — som do easter egg
- `inc/`, `js/`, `css/`, `genericons/` — intocados do original

## Histórico de versões

Ver **[CHANGELOG.md](CHANGELOG.md)** — todas as versões (v2.6.1 → v2.7.27) com detalhes, causas raiz e verificações.
Releases com notas completas: https://github.com/Amielle-Inside/newsinside-twentyfifteen/releases

## Como usar

1. Baixe o [release mais recente](https://github.com/Amielle-Inside/newsinside-twentyfifteen/releases/latest) (zip do código-fonte)
2. No WordPress: `Aparência → Temas → Adicionar novo → Enviar tema` (ou extraia em `wp-content/themes/twentyfifteen-more/`)
3. Ative. As features NI são automáticas; o dark mode ativa pelo seletor **Light/Dark Side** quando logado como admin (preview) — para liberá-lo a todos, remova a checagem `is_user_logged_in()`/`current_user_can('administrator')` no hook `ni_dark_mode_admin_preview` do `functions.php`

## Licença

**GPL-2.0-or-later** — herdada integralmente do Twenty Fifteen. Use, estude, modifique e compartilhe. Os arquivos originais da WordPress Foundation mantêm seus créditos: http://www.gnu.org/licenses/gpl-2.0.html
