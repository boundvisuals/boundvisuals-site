# Daily Study · Briefings

Série #NNN · 3×/semana (terça, quinta, sábado) · base 3D no 3ds Max/Corona + AI + edição.
Guardar em: FREELANCER STUFF / 3D / PORTFOLIO / Daily Study - 2026 / `#NNN - nome` (extras em pastas "0 - clay", "0 - mask id", "0 - render base"; animações em "anim").
Regras: nunca só 3D, nunca só AI; coerência total entre ângulos; imagens simples e lindas; qualidade máxima.
Estes primeiros partem de geometria simples feita por ti (sem modelos de terceiros, logo sem questões de licença).

---

## #001 · Janelas: a luz de uma tarde (quinta, 5 nov)

**Ideia:** uma janela e a luz que entra, nada mais. Calma, fotográfica.

**1. Modelo 3D (15 min, tudo em caixas)**
- Sala 4 × 3 m, pé-direito 2,8 m. Uma parede com janela alta e estreita (0,9 × 1,8 m), caixilho preto fino (4 cm), vidro.
- Pavimento em madeira clara, paredes em branco quente.
- Só dois objetos: uma cadeira simples junto à janela e uma cortina leve (ou deixas a cortina para a AI).
- Sem pessoas, sem decoração extra.

**2. Câmaras (3, mesma sala), formato 4:5**
- A: frontal à janela, 35 mm, altura 1,2 m.
- B: de lado a 45°, 35 mm, a ver a luz a cair no chão.
- C: detalhe do peitoril e do caixilho, 50 mm.

**3. Luz:** Corona Sun, elevação ~15°, tom dourado, céu limpo. Referência: luz rasante, sombra longa do caixilho no chão e na parede.

**4. Render base:** Corona, 1600 px no lado maior, denoise ligado, sem pós. Guardar também clay e mask ID.

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural interior photograph, same room, same geometry and camera as the reference image. Low golden afternoon sun entering the tall narrow window, long soft shadow of the black window frame on the light oak floor and the warm white plaster wall, fine film grain, quiet and minimal, no people, no extra objects.
```
Depois upscale (SeedVR2) e grade leve igual nas 3.

**6. Entrega:** 3 imagens finais em "#001 - Janelas / final". Eu faço o carrossel (4:5 + imagem inteira em branco) e a legenda.

**Legenda (EN primeiro, PT a seguir)**
- EN: "Daily Study #001. One window, one afternoon, one shadow. 3D base, AI finish."
- PT: "Daily Study #001. Uma janela, uma tarde, uma sombra. Base 3D, acabamento AI."

---

## #002 · Escada escultural (sábado, 7 nov)

**Ideia:** uma escada como peça de escultura, num espaço vazio.

**1. Modelo 3D (20 min)**
- Caixa 5 × 5 m, pé-direito 4 m, paredes e teto em betão claro.
- Escada reta em degraus em balanço (consola) fixos a uma parede: 14 degraus, 1,0 m largura, 4 cm de espessura em aço preto, sem guarda ao lado da parede.
- Uma abertura zenital estreita no teto (0,4 × 3 m) por cima da escada.

**2. Câmaras (3), 4:5**
- A: de baixo para cima, 24 mm, a ver a escada a subir para a luz.
- B: lateral, 35 mm, perfil dos degraus.
- C: detalhe de um degrau e a parede, 85 mm.

**3. Luz:** sol zenital duro pela abertura, sombra em faixa na parede. Sem luz de enchimento forte.

**4. Render base:** igual ao #001 (1600 px, clay e mask ID guardados).

**5. AI (Nano Banana)**
```
Photorealistic architectural photograph, same space, same stair geometry and camera as the reference. Raw light concrete walls with subtle formwork texture, black steel cantilevered steps, hard zenithal sunlight from the roof slot casting a clean band of light and shadow on the wall, slight dust in the air, restrained muted palette, no people.
```

**Legenda**
- EN: "Daily Study #002. A stair as a sculpture. Concrete, steel and one slot of light."
- PT: "Daily Study #002. Uma escada como escultura. Betão, aço e uma fenda de luz."

---

## #003 · Mesma divisão, 3 materiais (terça, 10 nov)

**Ideia:** o mesmo volume em pedra, madeira e betão.

**1. Modelo 3D:** caixa 4 × 4 × 3 m, uma porta, uma janela quadrada de 1,2 m, uma banca/bancada corrida junto à parede de fundo. Guarda uma cena e troca só os materiais.

**2. Câmara (1, igual nas 3 versões), 4:5, 28 mm, altura 1,3 m.**

**3. Luz:** luz difusa de céu nublado, sem sol direto.

**4. Render base:** 3 renders (pedra, madeira, betão), mesma câmara e luz.

**5. AI (Nano Banana, 3 prompts, só muda o material)**
```
Photorealistic interior photograph, same room and camera as the reference. All surfaces in honed natural limestone, soft overcast daylight, muted warm palette, fine grain, no people.
```
Repetir trocando "honed natural limestone" por "pale oak timber" e por "board-formed concrete".

**Legenda**
- EN: "Daily Study #003. One room, three materials. Stone, timber, concrete."
- PT: "Daily Study #003. Uma divisão, três materiais. Pedra, madeira, betão."

---

## #004 · Cabana mínima, um só material (quinta, 12 nov)

**Ideia:** 20 m² de cabana toda em madeira escura, sozinha numa clareira com nevoeiro. Tudo o resto é silêncio.

**1. Modelo 3D (20 min)**
- Volume 5 × 4 m, telhado de duas águas a 45°, cumeeira a 4,2 m. Sem beirado (telhado e paredes no mesmo plano).
- Tudo no mesmo material: ripado vertical de madeira queimada (shou sugi ban), ripas de 6 cm com junta de 1 cm.
- Uma única janela grande na empena (2,4 × 2,0 m), caixilho escondido; uma porta estreita na fachada lateral.
- Terreno: plano simples com ligeiro declive; árvores só como cilindros/cones de referência (a AI substitui).

**2. Câmaras (3), formato 4:5**
- A: três quartos, 35 mm, altura 1,6 m, cabana no terço direito, muito céu/nevoeiro à esquerda.
- B: frontal à empena, 50 mm, simétrica, janela ao centro com luz quente no interior.
- C: detalhe do ripado na esquina, 85 mm, profundidade de campo curta.

**3. Luz:** Corona Sky nublado + nevoeiro volumétrico leve (ou deixas o nevoeiro para a AI). No interior, uma luz quente 2700 K fraca, só para a janela brilhar.

**4. Render base:** 1600 px no lado maior, denoise ligado, sem pós. Guardar "0 - clay" e "0 - mask id" (cabana / chão / árvores / céu em cores diferentes).

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A minimal gabled cabin clad entirely in charred black timber (shou sugi ban) vertical battens, standing alone in a misty pine forest clearing at early morning, soft overcast light, low fog between the trees, wet grass, one warm interior light glowing through the large gable window, muted green and grey palette, fine film grain, quiet and calm, no people.
```
Depois upscale (SeedVR2) e a mesma grade nas 3. Se a AI mudar a forma do telhado ou a janela, reforça com a mask ID.

**6. Entrega:** 3 finais em "#004 - Cabana / final". Opcional para reel: animar a câmara A 5 s (LTX 2.5, nevoeiro a mover-se devagar, câmara parada).

**Legenda**
- EN: "Daily Study #004. Twenty square metres, one material, one window. 3D base, AI finish."
- PT: "Daily Study #004. Vinte metros quadrados, um material, uma janela. Base 3D, acabamento AI."

---

## #005 · Uma chávena como anúncio de luxo (sábado, 14 nov)

**Ideia:** o objeto mais banal da casa, filmado como um perfume. Primeiro Daily Study de produto.

**1. Modelo 3D (15 min)**
- Chávena de café expresso simples: cilindro com 6 cm de diâmetro, 5,5 cm de altura, parede de 4 mm, asa em anel. Pires redondo de 12 cm.
- Material: porcelana branca mate por fora, vidrado brilhante por dentro. Café com crema (disco com leve espuma).
- Base: um bloco de pedra escura polida (30 × 20 × 4 cm) num fundo infinito (cyclorama) cinzento quente #c5c1b7.

**2. Câmaras (3), 4:5**
- A: hero, 85 mm, ligeiramente acima (15°), chávena centrada, muito espaço vazio por cima para texto.
- B: rasante ao nível do pires, 100 mm macro, reflexo da chávena na pedra.
- C: de cima (top view), 50 mm, círculo da chávena e do pires como composição gráfica.

**3. Luz:** estúdio. Uma softbox grande por trás e à esquerda (contraluz que desenha o contorno), um rebatedor branco à direita, nada de luz de frente. Fundo com gradiente suave.

**4. Render base:** 2000 px no lado maior (produto pede mais detalhe), denoise ligado. Guardar "0 - clay" e "0 - mask id" (chávena / pires / café / pedra / fundo).

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
High-end luxury product photograph, same objects, same geometry and camera as the reference image. A white matte porcelain espresso cup and saucer with a perfect hazelnut crema, a thin wisp of steam rising, placed on a polished dark basalt stone block, seamless warm grey studio background with a soft gradient, large soft backlight drawing a clean rim on the porcelain, subtle reflection on the stone, minimal and elegant, shot like a fragrance campaign, crisp detail, no text, no logos, no people.
```
Upscale (SeedVR2). Atenção: a crema e o vapor são onde a AI costuma falhar; se o vapor ficar exagerado, pede "a very faint wisp of steam".

**6. Entrega:** 3 finais em "#005 - Chávena / final". Para reel: câmara B animada 5 s (vapor a subir, câmara a deslizar 2 cm para a direita).

**Legenda**
- EN: "Daily Study #005. An espresso cup, lit like a perfume. The everyday deserves a campaign too."
- PT: "Daily Study #005. Uma chávena de café, iluminada como um perfume. O dia a dia também merece uma campanha."

---

## #006 · Luz dura vs luz suave (terça, 17 nov)

**Ideia:** a mesma cena, duas luzes opostas, lado a lado num carrossel. Ensina a olhar para a luz.

**1. Modelo 3D (15 min)**
- Pátio exterior: uma parede branca rebocada de 6 × 3,5 m com um banco em betão em balanço (3 m) e um vão retangular (1,2 × 2,2 m) que deixa ver um segundo plano.
- Chão em lajetas de pedra clara 60 × 60. Uma oliveira (proxy; a AI faz a árvore final) atrás do vão.

**2. Câmara (1, igual nas 2 versões), 4:5, 35 mm, altura 1,4 m, frontal à parede ligeiramente descentrada.**

**3. Luz (2 renders, a mesma câmara)**
- Dura: Corona Sun às 13 h de verão, elevação ~65°, sombra recortada do banco e da árvore na parede.
- Suave: céu totalmente nublado, sem sol, contraste baixo.

**4. Render base:** 2 renders (dura e suave), 1600 px. Guardar "0 - clay" e "0 - mask id".

**5. AI (Nano Banana, 2 prompts, só muda a luz)**
```
Photorealistic Mediterranean architectural photograph, same courtyard, same geometry and camera as the reference image. White lime-plastered wall, cantilevered concrete bench, pale limestone paving, an old olive tree seen through the rectangular opening. Harsh midday summer sun, crisp hard shadows of the bench and the olive branches on the wall, deep blue sky, high contrast, fine film grain, no people.
```
Para a versão suave, trocar a frase da luz por: "soft diffused overcast light, no direct sun, gentle shadowless gradients, calm low contrast, pale grey sky".

**6. Entrega:** 2 finais em "#006 - Luz dura vs suave / final" (nome dos ficheiros: "1 dura", "2 suave"). Eu monto o carrossel e um reel com cortina (wipe) de uma para a outra.

**Legenda**
- EN: "Daily Study #006. Same wall, same bench, same tree. Only the light changed. Which one would you live with?"
- PT: "Daily Study #006. A mesma parede, o mesmo banco, a mesma árvore. Só mudou a luz. Com qual ficavas?"

---

## #007 · Um candeeiro, 3 ambientes (quinta, 19 nov)

**Ideia:** um único objeto desenhado por ti, colocado em três casas diferentes. Produto + interior.

**1. Modelo 3D (25 min)**
- Candeeiro suspenso: cúpula em cone achatado (Ø 40 cm, altura 18 cm) em alumínio, cabo têxtil fino, florão no teto. Por dentro, difusor opalino.
- Uma sala base simples (5 × 4 × 2,8 m) com mesa de jantar retangular (2,0 × 0,9 m) e 4 cadeiras simples. O candeeiro a 75 cm acima da mesa.
- Guarda UMA cena; muda só os materiais da sala e do candeeiro para as 3 versões.

**2. Câmaras (2, iguais nas 3 versões), 4:5**
- A: sala, 28 mm, altura 1,3 m, candeeiro no terço superior.
- B: detalhe do candeeiro, 85 mm, a ver o brilho do difusor.

**3. Luz:** fim de tarde (sol baixo fraco pela janela) + candeeiro aceso 2700 K. É o candeeiro que tem de mandar na imagem.

**4. Render base:** 6 renders (3 ambientes × 2 câmaras), 1600 px. Guardar "0 - clay" e "0 - mask id".

**5. AI (Nano Banana, 3 prompts, só muda o ambiente)**
```
Photorealistic interior photograph, same room, same geometry and camera as the reference image. A brushed aluminium cone pendant lamp glowing warm above an oak dining table, early evening, the lamp is the main light source, soft pool of warm light on the table, Scandinavian interior with white walls, light oak floor and linen curtains, calm and cosy, fine film grain, no people.
```
Ambiente 2: trocar o fim por "Japandi interior, dark stained timber, washi paper screens, tatami-toned floor". Ambiente 3: "Brutalist interior, raw board-formed concrete walls, black steel, polished concrete floor". O candeeiro tem de ficar IGUAL nas 3 (usa a mask ID para o proteger).

**6. Entrega:** 6 finais em "#007 - Candeeiro / final" (nomes "1A", "1B", "2A"…). Eu faço o carrossel por ambiente.

**Legenda**
- EN: "Daily Study #007. One lamp, three homes. Scandinavian, Japandi, Brutalist. Designed, modelled and lit by me."
- PT: "Daily Study #007. Um candeeiro, três casas. Escandinava, Japandi, Brutalista. Desenhado, modelado e iluminado por mim."

---

## #008 · Ruína portuguesa → casa recuperada (sábado, 21 nov)

**Ideia:** antes e depois. Uma casa de granito em ruína e a mesma casa recuperada, mesmo ângulo. Forte para reel (wipe).

**1. Modelo 3D (25 min)**
- Casa rural de um piso, 10 × 6 m, paredes de granito com 60 cm de espessura, telhado de duas águas em telha.
- Dois vãos de janela e uma porta na fachada principal (vãos pequenos, como as casas antigas do Norte).
- Versão "ruína": tira o telhado e um canto da parede (só o volume, a AI faz as pedras soltas e a vegetação).
- Versão "recuperada": telhado novo, caixilhos em madeira escura recuados na parede, um volume novo em vidro encostado à empena (3 × 4 m).

**2. Câmaras (2, iguais nas 2 versões), 4:5**
- A: três quartos da fachada, 35 mm, altura 1,6 m.
- B: pormenor da porta / encontro granito-vidro, 50 mm.

**3. Luz:** fim de tarde de outono, sol baixo e quente a rasar o granito (é a luz que mostra a textura).

**4. Render base:** 4 renders (ruína/recuperada × 2 câmaras), 1600 px. Guardar "0 - clay" e "0 - mask id".

**5. AI (Nano Banana, 2 prompts)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. An abandoned traditional granite farmhouse in rural northern Portugal, roofless, collapsed corner, rough weathered granite blocks, ivy and wild grass growing inside, broken timber beams, low warm autumn sun grazing the stone, oak trees and stone terraces behind, melancholic and quiet, fine film grain, no people.
```
Versão recuperada:
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A carefully restored traditional granite farmhouse in rural northern Portugal, original weathered granite walls kept, new clay tile roof, dark timber window frames set deep in the stone, a minimal frameless glass extension against the gable, a tidy gravel path and wild meadow, low warm autumn sun grazing the stone, oak trees and stone terraces behind, calm contemporary rural architecture, fine film grain, no people.
```
Os dois pares têm de alinhar ao píxel (mesma câmara): é isso que faz o reel funcionar.

**6. Entrega:** 4 finais em "#008 - Ruina recuperada / final" ("A antes", "A depois", "B antes", "B depois"). Eu monto o carrossel e um reel com wipe antes → depois.

**Legenda**
- EN: "Daily Study #008. Before and after. A granite ruin in the north of Portugal, given a second life."
- PT: "Daily Study #008. Antes e depois. Uma ruína de granito no Norte, com uma segunda vida."

---

## #009 · Piscina à noite (terça, 24 nov)

**Ideia:** primeira cena noturna da série. Água iluminada, um muro, uma árvore. Minimalismo de três elementos.

**1. Modelo 3D (15 min)**
- Piscina retangular 12 × 3 m, borda em pedra clara (lajetas 100 × 50), água ao nível da borda.
- Um muro alto (2,5 m) em betão ao longo de um dos lados maiores, com uma faixa de luz rasante escondida no topo.
- Uma árvore só (proxy, a AI faz: pode ser um pinheiro-manso) no fundo, iluminada de baixo.
- Uma espreguiçadeira simples. Mais nada.

**2. Câmaras (3), 4:5**
- A: no eixo da piscina, 28 mm, altura 1,0 m, linhas a fugir para a árvore.
- B: rasante à água, 35 mm, reflexo do muro e da árvore.
- C: pormenor da luz no muro e da borda, 85 mm.

**3. Luz:** hora azul (céu azul profundo, ainda com algum gradiente no horizonte). Luzes da piscina 3000 K debaixo de água, faixa de luz no muro 2700 K, foco no pé da árvore. Exposição pensada para as luzes, não para o céu.

**4. Render base:** 1600 px, denoise ligado. Guardar "0 - clay", "0 - mask id" e, se puderes, um render só com as luzes (light mix) para eu fazer variações.

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural night photograph, same space, same geometry and camera as the reference image. A minimal rectangular swimming pool at blue hour, deep blue sky with a faint warm glow on the horizon, turquoise underwater lights, a hidden warm LED strip grazing a tall board-formed concrete wall, a single umbrella pine uplit at the end of the pool, still water with clean reflections, pale limestone edge, one simple lounger, calm luxury, fine film grain, no people.
```
Upscale (SeedVR2). Cuidado com o ruído no céu e com banding no gradiente azul: exporta em 16 bits até ao fim.

**6. Entrega:** 3 finais em "#009 - Piscina noite / final". Para reel: câmara A animada 5 s (LTX 2.5, água a ondular muito devagar).

**Legenda**
- EN: "Daily Study #009. Water, a wall and one pine. Blue hour is the best hour."
- PT: "Daily Study #009. Água, um muro e um pinheiro. A hora azul é a melhor hora."

---

## #010 · Uma cadeira, 3 materiais (quinta, 26 nov)

**Ideia:** o mesmo desenho de cadeira em madeira, aço e betão. Produto puro, três personalidades. Carrossel natural.

**1. Modelo 3D (20 min, desenho teu)**
- Cadeira de linhas simples desenhada por ti: assento 45 × 45 cm a 45 cm do chão, costas inclinadas 8°, quatro pernas quadradas de 3 × 3 cm (ou uma base em consola, se preferires).
- Três cópias lado a lado na cena para render, cada uma com o seu material: carvalho natural oleado; aço escovado com assento em couro castanho; betão afagado (versão "escultura").
- Fundo infinito (cyclorama) em #e5e5e3, chão igual ao fundo.

**2. Câmaras (3), 4:5, a mesma para cada material**
- A: três quartos, 85 mm, altura 0,7 m (a câmara ao nível do assento).
- B: pormenor do encontro perna-assento, 100 mm macro.
- C: as três cadeiras juntas, frontal, 50 mm (imagem de abertura do carrossel).

**3. Luz:** estúdio. Uma softbox grande em cima e ligeiramente atrás (luz de tecto suave), uma tira de luz lateral à esquerda para desenhar a aresta, sombra de contacto suave no chão.

**4. Render base:** 2000 px, um render por material e câmara (7 renders). Guardar "0 - clay" e "0 - mask id" (pernas / assento / costas / chão).

**5. AI (Nano Banana, um prompt por material, sempre a mesma estrutura)**
```
High-end furniture product photograph, same object, same geometry and camera as the reference image. A minimal contemporary chair made of [natural oiled oak with visible straight grain | brushed stainless steel frame with a cognac leather seat | smooth cast concrete with tiny air pockets], seamless off-white studio background, large soft overhead light, a thin rim light from the left tracing the edges, soft contact shadow, crisp material detail, minimal and calm, no text, no logos, no people.
```
Cola só uma das três opções entre parênteses retos de cada vez. Upscale (SeedVR2). O betão tem de parecer pesado e o aço não pode ter reflexos de estúdio estranhos: se aparecer, pede "soft diffuse reflections only".

**6. Entrega:** 7 finais em "#010 - Cadeira 3 materiais / final". Eu monto o carrossel (C primeiro, depois A e B de cada material) e um reel com transição de material sobre a mesma cadeira.

**Legenda**
- EN: "Daily Study #010. One chair, three materials. Oak is warm, steel is precise, concrete is stubborn."
- PT: "Daily Study #010. Uma cadeira, três materiais. O carvalho é quente, o aço é exato, o betão é teimoso."

---

## #011 · Casas de Portugal #1: Douro (sábado, 28 nov)

**Ideia:** início da série "Casas de Portugal" (uma por região). Uma casa contemporânea nos socalcos do Douro, entre vinhas.

**1. Modelo 3D (25 min)**
- Terreno em socalcos: 3 patamares de 3 m de altura cada, muros de xisto (só caixas, a AI faz a pedra).
- Casa de um piso, 18 × 6 m, encaixada no patamar do meio, cobertura plana ajardinada, fachada para o rio toda em vidro recuado 1,5 m (sombra profunda).
- Paredes laterais em betão pigmentado cor de terra; um terraço em consola de 4 m sobre o patamar de baixo.
- Linhas de vinha em proxies (cilindros finos) nos patamares; o rio é um plano ao fundo.

**2. Câmaras (3), 4:5**
- A: vista do vale, 50 mm, a casa pequena na paisagem (os socalcos são o assunto).
- B: três quartos a partir do patamar de baixo, 28 mm, terraço em consola por cima.
- C: interior para fora: da sala para o rio, 24 mm, caixilho a emoldurar o vale.

**3. Luz:** fim de tarde de outono (vindima acabada): folhas da vinha amarelas e vermelhas, sol baixo vindo de jusante, neblina leve no rio.

**4. Render base:** 1600 px. Guardar "0 - clay" e "0 - mask id" (casa / socalcos / vinha / rio / céu).

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A contemporary single-storey house embedded in the terraced vineyards of the Douro Valley, Portugal, earth-toned pigmented concrete walls, deeply recessed full-height glazing, a cantilevered terrace over the lower terrace, dry-stone schist terrace walls, autumn vineyards in yellow, rust and red, the Douro river below with a light mist, low warm late-afternoon sun, quiet and timeless, fine film grain, no people.
```
Upscale (SeedVR2). Coerência: as cores da vinha têm de ser as mesmas nas 3 câmaras (se uma sair mais verde, refaz com "same autumn colours as the other views").

**6. Entrega:** 3 finais em "#011 - Casas de Portugal Douro / final". Para reel: câmara A animada 5 s (LTX 2.5, neblina a mover-se devagar no rio).

**Legenda**
- EN: "Daily Study #011 · Houses of Portugal #1: Douro. A house that steps into the vineyards instead of standing on them."
- PT: "Daily Study #011 · Casas de Portugal #1: Douro. Uma casa que entra nos socalcos em vez de se pôr em cima deles."

---

## #012 · Macro: a textura é a protagonista (terça, 1 dez)

**Ideia:** três materiais tão perto que quase parecem abstratos. Rápido de fazer, muito forte no feed (e ótimo para stories).

**1. Modelo 3D (10 min)**
- Três planos de 40 × 40 cm, cada um com um material: granito amarelo (amaciado), madeira de pinho queimada (shou sugi ban), betão de cofragem em tábua.
- Displacement real no material (é aqui que o 3D ganha à AI): mapa de altura forte, subdivisão alta.
- Em cada plano, um elemento pequeno para dar escala: um parafuso, uma gota de água, uma folha seca.

**2. Câmaras (3, uma por material), 4:5**
- 100 mm macro, a 25 cm do material, inclinada 20° (para a luz rasar o relevo). Profundidade de campo curta (f/2.8), foco no elemento de escala.

**3. Luz:** uma única luz dura muito rasante (quase paralela à superfície), quente 3500 K. Nada de luz de enchimento: sombras pretas a sério.

**4. Render base:** 2400 px (macro pede detalhe), denoise ligado mas suave. Guardar "0 - clay".

**5. AI (Nano Banana, um prompt por material)**
```
Extreme macro photograph, same surface, same geometry and camera as the reference image. Close-up of [honed yellow Portuguese granite with mica sparkles | charred shou sugi ban pine with deep alligator cracks | board-formed concrete with fine wood grain imprint], a single tiny [steel screw | water droplet | dry oak leaf] in sharp focus, very shallow depth of field, one hard grazing warm light revealing every relief, deep black shadows, tactile and abstract, crisp detail, no text, no people.
```
Upscale (SeedVR2) com cuidado: o granulado não pode ficar "pintado". Compara a 100% com o render base.

**6. Entrega:** 3 finais em "#012 - Macro texturas / final". Para reel: slow zoom (eu faço, sem animação AI).

**Legenda**
- EN: "Daily Study #012. Get closer. Granite, burnt pine and concrete, where architecture starts."
- PT: "Daily Study #012. Mais perto. Granito, pinho queimado e betão, onde a arquitetura começa."

---

## #013 · A mesma sala, do nascer ao pôr do sol (quinta, 3 dez)

**Ideia:** uma câmara fixa, cinco horas do dia. Carrossel de 5 e um reel time-lapse feito de stills.

**1. Modelo 3D (15 min)**
- Sala 6 × 4 m, pé-direito 3 m, uma parede inteira em vidro virada a sul, outra com uma janela alta a nascente.
- Chão em microcimento claro, paredes em cal branca, um sofá baixo, uma mesa de centro, uma planta grande (proxy).

**2. Câmara (1, fixa), 4:5**
- Do canto oposto ao vidro, 24 mm, altura 1,3 m. Não mexer na câmara entre renders.

**3. Luz:** 5 renders com o sol do Corona (sistema solar com data 21 de junho, Porto): 07:00 (nascer, rosa e frio), 10:00 (luz limpa), 13:00 (sol a pique, sombras curtas), 17:00 (quente, sombras longas no chão), 20:30 (pôr do sol, laranja e depois azul).

**4. Render base:** 1600 px, a mesma exposição base e depois acertada à mão em cada hora (para não ficar tudo igual). Guardar "0 - clay".

**5. AI (Nano Banana, o mesmo prompt nas 5 imagens, só muda a hora)**
```
Photorealistic interior photograph, same room, same geometry, same camera and same sunlight direction as the reference image. A calm minimal living room with a full-height south-facing glass wall, pale microcement floor, white lime-washed walls, a low linen sofa, an oak coffee table and a large olive tree in a clay pot, [soft pink sunrise light | clean morning light | harsh midday sun with short shadows | warm late-afternoon light with long shadows | orange sunset turning into blue dusk], quiet and lived-in, fine film grain, no people.
```
A AI não pode mudar nada na sala entre horas: se mudar a planta ou o sofá, refaz. Se possível usa a imagem das 10:00 como referência de conteúdo nas outras.

**6. Entrega:** 5 finais em "#013 - Sala dia inteiro / final" com a hora no nome ("07h00", "10h00"…). Eu faço o reel com dissolve entre horas.

**Legenda**
- EN: "Daily Study #013. One room, one camera, one day. Architecture is just a way to hold the light."
- PT: "Daily Study #013. Uma sala, uma câmara, um dia. A arquitetura é só uma maneira de segurar a luz."

---

## #014 · Um café que não existe (sábado, 5 dez)

**Ideia:** interior comercial imaginário: um café de bairro no Porto, pequeno, quente, com marca inventada (sem logótipos reais).

**1. Modelo 3D (25 min)**
- Loja de rua 5 × 9 m, pé-direito 3,5 m, montra para a rua com caixilho em madeira escura.
- Balcão em pedra (lioz ou mármore rosa de Estremoz) com frente em réguas de madeira, máquina de café em caixa simples (a AI faz o resto), 3 mesas pequenas redondas e um banco corrido na parede.
- Parede do fundo em azulejo verde (só a cor e a grelha 14 × 14 cm; a AI faz o vidrado).
- Candeeiros pendentes em esfera opalina sobre o balcão.

**2. Câmaras (3), 4:5**
- A: da porta para dentro, 24 mm, balcão à esquerda, azulejo ao fundo.
- B: atrás do balcão para a rua, 35 mm, montra com a rua desfocada.
- C: pormenor de uma mesa com chávena e croissant, 85 mm.

**3. Luz:** manhã de inverno: luz fria a entrar pela montra, pendentes acesos 2700 K. Contraste quente dentro / frio fora.

**4. Render base:** 1600 px. Guardar "0 - clay" e "0 - mask id" (balcão / azulejo / mobiliário / montra).

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same space, same geometry and camera as the reference image. A small neighbourhood café in Porto, Portugal, on a winter morning, a pink Estremoz marble counter with a dark oak slatted front, glossy handmade green ceramic wall tiles, round opal glass pendant lights glowing warm, small round marble tables and a built-in upholstered bench, cool daylight through a dark timber shopfront, a blurred cobbled street outside, cosy and refined, no readable text, no logos, fine film grain, no people.
```
Para C acrescenta: "an espresso cup and a croissant on the table, shallow depth of field". O azulejo tem de ter a mesma cor nas 3 câmaras.

**6. Entrega:** 3 finais em "#014 - Cafe Porto / final". Opcional: versão com pessoas para o #015.

**Legenda**
- EN: "Daily Study #014. A café in Porto that doesn't exist (yet). Green tiles, pink marble, a cold morning outside."
- PT: "Daily Study #014. Um café no Porto que (ainda) não existe. Azulejo verde, mármore rosa, uma manhã fria lá fora."

---

## #015 · Vazio vs com vida (terça, 8 dez)

**Ideia:** a mesma imagem duas vezes: o espaço vazio (como a arquitetura gosta) e cheio de gente (como a vida é). Reaproveita o café do #014, por isso é rápido.

**1. Modelo 3D (5 min)**
- A mesma cena do #014. Não é preciso modelar nada: só garantir que há espaço livre para pessoas (afastar uma mesa se for preciso).

**2. Câmaras (2), 4:5**
- A: a mesma câmara A do #014.
- B: nova, rasante ao nível das mesas, 35 mm, para as pessoas ficarem em primeiro plano desfocado.

**3. Luz:** a mesma do #014, mas meio da manhã (um pouco mais de sol a entrar).

**4. Render base:** 1600 px (A já existe; render só da B). Guardar "0 - clay".

**5. AI (Nano Banana, 2 passos)**
Primeiro, a versão vazia é a final do #014. Depois, por cima dela:
```
Same photograph, same space, same lighting and camera, unchanged architecture and furniture. Add a few natural, candid people: a barista behind the counter, two friends talking at a table, an older man reading a newspaper by the window, one person entering with a coat, slight motion blur on the person walking, nobody looking at the camera, realistic proportions and hands, everyday clothing in muted winter tones, fine film grain.
```
Revê mãos, caras e sombras das pessoas a 100% (é onde a AI falha). Se alguma pessoa ficar estranha, apaga-a com máscara e regenera só essa zona.

**6. Entrega:** 4 finais em "#015 - Vazio vs vida / final" ("A vazio", "A vida", "B vazio", "B vida"). Eu monto o carrossel e um reel com wipe vazio → vida.

**Legenda**
- EN: "Daily Study #015. Empty for the architect, full for everyone else. Which one would you post?"
- PT: "Daily Study #015. Vazio para o arquiteto, cheio para toda a gente. Qual publicavas?"

---

## #016 · Uma fachada, 4 estações (quinta, 10 dez)

**Ideia:** a mesma casa e a mesma câmara em primavera, verão, outono e inverno. Carrossel de 4 e um reel com dissolve entre estações.

**1. Modelo 3D (15 min)**
- Casa de dois pisos, 12 × 8 m, volumes simples, reboco branco e base em granito (só cor, a AI faz a pedra).
- Uma árvore de folha caduca grande à frente, a 6 m da fachada (proxy simples: tronco + copa em esfera). É ela que conta as estações.
- Jardim com relva e um caminho de lajes até à porta; muro baixo à frente.

**2. Câmara (1, fixa), 4:5**
- Frontal ligeiramente de lado (15°), 35 mm, altura 1,6 m, a árvore no terço esquerdo. Não mexer na câmara entre renders.

**3. Luz:** 4 renders com o sol do Corona em datas diferentes (Porto, 16:00): 21 abril (luz limpa), 21 julho (sol alto, sombras curtas), 21 outubro (sol baixo e quente), 21 janeiro (céu encoberto, luz fria).

**4. Render base:** 1600 px. Guardar "0 - clay" e "0 - mask id" (casa / árvore / jardim / céu).

**5. AI (Nano Banana, o mesmo prompt nas 4 imagens, só muda a estação)**
```
Photorealistic architectural photograph, same building, same geometry, same camera and same sun direction as the reference image. A two-storey contemporary house with white lime render and a honed granite base in northern Portugal, a large deciduous tree in front, a stone slab path across the lawn, a low wall in the foreground, [spring: fresh light green leaves and small wildflowers in the grass | summer: dense dark green canopy, dry golden grass, strong sun | autumn: orange and rust leaves on the tree and on the lawn, warm low sun | winter: bare branches, wet path, frost on the grass, soft overcast light], quiet and timeless, fine film grain, no people.
```
A casa não pode mudar entre estações (janelas, portas, granito iguais). Usa a imagem da primavera como referência de conteúdo nas outras três.

**6. Entrega:** 4 finais em "#016 - Quatro estacoes / final" com a estação no nome ("1 primavera", "2 verao"…). Eu faço o reel com dissolve.

**Legenda**
- EN: "Daily Study #016. One house, one camera, four seasons. The architecture stays, the tree does all the talking."
- PT: "Daily Study #016. Uma casa, uma câmara, quatro estações. A arquitetura fica, a árvore é que fala."

---

## #017 · Packaging para uma marca portuguesa inventada (sábado, 12 dez)

**Ideia:** produto e CGI: uma lata de sardinhas e uma garrafa de azeite de uma marca fictícia ("Maré Alta", inventada; antes de publicar confirmo que não é marca registada e, se for, troco o nome). Mostra que fazes produto de anúncio, não só arquitetura.

**1. Modelo 3D (20 min)**
- Lata retangular de conserva 10,5 × 7,5 × 2,5 cm com abertura de anel (a tampa meio enrolada para mostrar as sardinhas: 3 cilindros achatados chegam, a AI faz o resto).
- Garrafa de azeite quadrada 500 ml, vidro escuro, rolha de cortiça.
- Base: uma laje de pedra lioz e um pano de linho dobrado atrás.
- Rótulo: só um retângulo com a cor (azul petróleo #1f4e5a e creme). O texto "MARÉ ALTA" faço eu no Photoshop por cima no fim, não peças texto à AI.

**2. Câmaras (3), 4:5**
- A: herói, 85 mm, a lata aberta à frente e a garrafa atrás, ligeiramente de cima (15°).
- B: top-down 90°, 50 mm, composição flat lay com pão, limão e sal grosso.
- C: macro da lata aberta, 100 mm, f/2.8, foco no brilho do azeite nas sardinhas.

**3. Luz:** estúdio com luz de janela grande à esquerda (softbox 2 × 2 m), um contraluz fino para o brilho do vidro e do metal, fundo cor de areia.

**4. Render base:** 2000 px. Guardar "0 - clay" e "0 - mask id" (lata / garrafa / rótulos / pedra / adereços).

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Premium product advertising photograph, same objects, same geometry and camera as the reference image. A rectangular Portuguese sardine tin with the ring-pull lid half rolled back revealing glossy sardines in golden olive oil, a square dark-glass olive oil bottle with a natural cork stopper, plain petrol-blue and cream paper labels with no readable text, on a honed pale limestone slab with folded natural linen behind, soft large window light from the left, a thin rim light catching the glass and the tin, sand-coloured background, rich and appetising, crisp detail, no text, no logos, no people.
```
Para B acrescenta: "flat lay from above with a slice of rustic bread, half a lemon and coarse sea salt". Os rótulos ficam lisos; o logótipo entra em pós (3 imagens com o mesmo tipo de letra, eu faço o layout se me mandares as finais).

**6. Entrega:** 3 finais em "#017 - Packaging Mare Alta / final" (sem texto) + eu ponho o nome da marca. Para reel: câmara A em slow push-in (LTX 2.5, 5 s, só o reflexo do azeite a mexer).

**Legenda**
- EN: "Daily Study #017. A Portuguese brand that doesn't exist: Maré Alta. Sardines, olive oil and limestone, product CGI from scratch."
- PT: "Daily Study #017. Uma marca portuguesa que não existe: Maré Alta. Sardinhas, azeite e lioz, CGI de produto do zero."

---

## #018 · Minimalismo extremo: um espaço, 3 elementos (terça, 15 dez)

**Ideia:** um quarto vazio com só três coisas lá dentro. Rápido de modelar, muito forte no feed: a luz e a proporção fazem tudo.

**1. Modelo 3D (10 min)**
- Volume 5 × 5 m, pé-direito 4 m, paredes e chão no mesmo material (betão claro afagado).
- Elemento 1: uma abertura vertical estreita (0,6 × 3,5 m) numa parede.
- Elemento 2: um banco em pedra maciça (2 × 0,45 × 0,45 m) encostado à parede oposta.
- Elemento 3: uma oliveira pequena num rasgo no chão (proxy: tronco + copa).

**2. Câmaras (2), 4:5**
- A: frontal simétrica, 28 mm, altura 1,2 m, a abertura ao centro.
- B: de lado, 50 mm, a faixa de sol a cair sobre o banco.

**3. Luz:** só o sol a entrar pela abertura (inverno, 11:00): uma faixa de luz dura no chão e no banco, o resto em luz rebatida suave. Nada de luzes artificiais.

**4. Render base:** 1600 px, com o GI a sério (é a luz rebatida que faz a imagem). Guardar "0 - clay".

**5. AI (Nano Banana, o mesmo prompt nas 2 câmaras)**
```
Photorealistic architectural photograph, same space, same geometry and camera as the reference image. An extreme minimalist room entirely in pale smooth concrete, one tall narrow vertical opening letting in a single blade of hard winter sunlight, a solid monolithic stone bench, a small olive tree growing from a slot in the floor, soft bounced light filling the rest of the room, silent and contemplative, subtle concrete texture and pores, fine film grain, no people, no other objects.
```
Se a AI acrescentar objetos (vasos, livros, quadros), refaz com "nothing else in the room". A faixa de sol tem de ficar no mesmo sítio que no render.

**6. Entrega:** 2 finais em "#018 - Tres elementos / final". Para reel: câmara A animada 5 s (LTX 2.5, poeira a flutuar na faixa de sol).

**Legenda**
- EN: "Daily Study #018. Three things: a slot of light, a stone bench, a tree. Nothing else needed."
- PT: "Daily Study #018. Três coisas: uma fenda de luz, um banco de pedra, uma árvore. Não é preciso mais nada."

---

## #019 · Exploded view: uma lanterna em peças (quinta, 17 dez)

**Ideia:** produto a flutuar desmontado peça a peça (exploded view), o tipo de imagem onde o 3D ganha à AI. Uma lanterna de mesa desenhada por ti (madeira, vidro, latão), boa para a época.

**1. Modelo 3D (25 min)**
- Lanterna 12 × 12 × 28 cm: base em carvalho, cilindro de vidro, suporte da vela em latão, tampa em latão com pega em couro, uma vela de cera.
- Duas versões da mesma cena: montada, e explodida na vertical (cada peça separada 4–6 cm, alinhadas no mesmo eixo, ligeira rotação de 5° em 2 peças para dar vida).
- Fundo infinito cor de pedra quente.

**2. Câmaras (2), 4:5**
- A: a 3/4, 70 mm, a lanterna montada com a vela acesa.
- B: a mesma câmara, a versão explodida (vela apagada, para se verem as peças).

**3. Luz:** estúdio, softbox grande por cima e à direita, um contraluz para o contorno do vidro, sombra suave no chão. Em A, a chama da vela a 1800 K como luz extra.

**4. Render base:** 2000 px. Guardar "0 - clay" e "0 - mask id" (madeira / vidro / latão / couro / vela). Para o reel, guarda também uma animação simples em 3ds Max (120 frames, montada → explodida) se tiveres tempo; senão eu faço com as duas imagens.

**5. AI (Nano Banana, o mesmo prompt nas 2 câmaras, depois só o que muda)**
```
Premium product photograph, same objects, same geometry and camera as the reference image. A handcrafted table lantern with a solid oak base, a clear glass cylinder, a brushed brass candle holder and brass lid with a stitched leather handle, a natural beeswax candle, on a seamless warm stone-coloured background, large soft key light from above right, a thin rim light outlining the glass, soft contact shadows, crisp materials and fine wood grain, no text, no logos, no people.
```
A: acrescenta "the candle is lit, warm flame glow on the glass and brass". B: acrescenta "exploded view, every part floating apart along the same vertical axis, perfectly aligned, the candle unlit". A AI não pode juntar nem inventar peças: se o fizer, usa o render base com mask id e aplica só nos materiais.

**6. Entrega:** 2 finais em "#019 - Lanterna exploded / final" ("A montada", "B explodida") + "anim" se fizeres a animação. Eu monto o reel montada → explodida → montada.

**Legenda**
- EN: "Daily Study #019. Every object is a small building. One lantern, taken apart: oak, glass, brass and leather."
- PT: "Daily Study #019. Cada objeto é um pequeno edifício. Uma lanterna desmontada: carvalho, vidro, latão e couro."

---

## #020 · Casas de Portugal #2: Serra da Estrela (sábado, 19 dez)

**Ideia:** segunda casa da série. Um refúgio de montanha em granito, noite de inverno com neve, janelas acesas. A imagem de Natal do feed, sem clichés.

**1. Modelo 3D (25 min)**
- Terreno inclinado com rochas grandes (esferas e caixas deformadas, a AI faz o granito).
- Casa de um piso e meio, 14 × 7 m, cobertura de duas águas muito inclinada (45°) em zinco escuro, paredes em granito grosso, um volume em vidro de canto virado ao vale.
- Uma chaminé em granito, um alpendre em madeira com lenha empilhada.
- Pinheiros (proxies) atrás e de lado; neve: deixa os planos horizontais brancos no render (a AI completa).

**2. Câmaras (3), 4:5**
- A: de longe, 50 mm, a casa pequena na encosta, céu de hora azul.
- B: três quartos a 15 m, 28 mm, o canto envidraçado aceso a dominar.
- C: interior para fora: da lareira para o canto envidraçado, 24 mm, neve lá fora.

**3. Luz:** hora azul (20 min depois do pôr do sol): céu azul profundo, interior a 2700 K, lareira acesa (luz laranja extra no interior). Contraste forte quente/frio.

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (casa / vidro / terreno / árvores / céu) e "0 - render base" (vai servir para o #021).

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A contemporary mountain refuge in Serra da Estrela, Portugal, thick rough-hewn grey granite walls, a steep dark zinc gable roof, a large corner glass volume glowing with warm interior light and a lit fireplace, a timber porch with stacked firewood, fresh snow on the ground, on the roof and on the pine trees, large granite boulders, deep blue hour sky, cold blue snow against warm golden windows, calm and silent, fine film grain, no people.
```
Para C acrescenta: "interior view from the fireplace towards the corner glazing, snowy landscape outside". A neve tem de ter a mesma quantidade nas 3 câmaras.

**6. Entrega:** 3 finais em "#020 - Casas de Portugal Serra da Estrela / final". Para reel: câmara B animada 5 s (LTX 2.5, neve a cair devagar, fumo da chaminé).

**Legenda**
- EN: "Daily Study #020 · Houses of Portugal #2: Serra da Estrela. Granite outside, fire inside, snow on everything."
- PT: "Daily Study #020 · Casas de Portugal #2: Serra da Estrela. Granito por fora, lume por dentro, neve em tudo."

---

## #021 · O mesmo prompt, 3 ferramentas (terça, 22 dez)

**Ideia:** conteúdo de processo, muito partilhável: o mesmo render base do #020 (câmara B) e o mesmo prompt em Nano Banana, FloraAI e ComfyUI. Sem modelar nada: rápido para a semana do Natal.

**1. Modelo 3D (0 min)**
- Usa o "0 - render base" da câmara B do #020. Não mexer no render.

**2. Imagens (4), 4:5**
- 1: render base (sem AI).
- 2: Nano Banana. 3: FloraAI (o modelo de imagem que usas lá por defeito). 4: ComfyUI (o teu workflow habitual com ControlNet de profundidade/linhas a partir do render).

**3. Luz:** a do #020, não muda.

**4. Regras do teste:** o mesmo prompt exatamente, a mesma resolução de saída, sem retoques no Photoshop, sem upscale (para ser justo). Anota o tempo e o número de tentativas de cada ferramenta (vai para a legenda).

**5. AI (o mesmo prompt nas 3 ferramentas)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A contemporary mountain refuge in Serra da Estrela, Portugal, thick rough-hewn grey granite walls, a steep dark zinc gable roof, a large corner glass volume glowing with warm interior light, fresh snow on the ground, on the roof and on the pine trees, deep blue hour sky, cold blue snow against warm golden windows, fine film grain, no people.
```
Escolhe tu a vencedora e diz porquê numa linha (fidelidade à geometria, materiais, luz). É essa opinião que faz o post.

**6. Entrega:** 4 imagens em "#021 - Mesmo prompt 3 ferramentas / final" ("1 render", "2 nano banana", "3 flora", "4 comfyui") + uma linha num ficheiro "notas.txt" com tempos, tentativas e a vencedora. Eu faço o carrossel com o nome da ferramenta em cada slide e um reel com wipe entre as 3.

**Legenda**
- EN: "Daily Study #021. Same render, same prompt, three tools: Nano Banana, FloraAI, ComfyUI. My pick is in the last slide. Yours?"
- PT: "Daily Study #021. O mesmo render, o mesmo prompt, três ferramentas: Nano Banana, FloraAI, ComfyUI. A minha escolha está no último slide. E a tua?"

---

## #022 · Desafio 15 minutos: a lanterna na janela (quinta, 24 dez)

**Ideia:** véspera de Natal, por isso o mais rápido de todos: 15 minutos de 3D com cronómetro, reaproveitando a lanterna do #019. Uma imagem calma, sem árvores de Natal nem clichés. O cronómetro faz parte do post.

**1. Modelo 3D (15 min, cronometrado)**
- Importa a lanterna montada do #019 (vela acesa).
- Um parapeito largo em pedra (caixa 1,2 × 0,4 m) e uma janela de guilhotina em madeira pintada (só caixilho + vidro), parede grossa à volta (60 cm, é uma casa antiga).
- Lá fora: um plano e 3–4 proxies de árvores; a AI faz a noite e a neblina.
- Grava o ecrã dos 15 minutos (OBS ou Win+Alt+R) para o reel acelerado.

**2. Câmara (1), 4:5**
- A: de dentro, ao nível do parapeito, 50 mm, lanterna no terço da direita, janela a ocupar o fundo.

**3. Luz:** só a vela (1800 K) dentro e uma luz azul muito fraca de fora (noite de inverno, 8000 K). Deixa o quarto quase escuro: o contraste é a imagem.

**4. Render base:** 1600 px, sem perder tempo com ruído (a AI limpa). Guardar "0 - clay".

**5. AI (Nano Banana)**
```
Photorealistic interior photograph, same objects, same geometry and camera as the reference image. A handcrafted oak, glass and brass lantern with a lit beeswax candle on the deep stone windowsill of an old Portuguese house, a painted timber sash window, outside a quiet winter night with soft mist and bare trees, cold blue darkness outside against the warm candle glow on the glass, the stone and the thick wall, still and silent, fine film grain, no text, no people.
```
Se a AI mudar a lanterna, usa o mask id do #019 e aplica só no fundo e na pedra.

**6. Entrega:** 1 final em "#022 - Desafio 15 min lanterna / final" + a gravação de ecrã em "video". Eu faço o reel: 15 minutos em 12 segundos → imagem final, com um contador no canto.

**Legenda**
- EN: "Daily Study #022 · 15-minute challenge. One lantern, one window, one quiet night. Merry Christmas."
- PT: "Daily Study #022 · Desafio de 15 minutos. Uma lanterna, uma janela, uma noite calma. Feliz Natal."

---

## #023 · Antes e agora: um render meu antigo, refeito hoje (sábado, 26 dez)

**Ideia:** pilar "Antes e agora". Escolhes um render teu antigo (2019–2021, o que te fizer mais impressão hoje) e refazes a mesma câmara com o teu processo atual: 3D + AI. Zero modelação nova, ótimo para a semana do Natal. Mostra quanto evoluíste sem dizer nada.

**1. Modelo 3D (10 min)**
- Abre a cena antiga. Não mexas na geometria nem na câmara (é a regra do jogo).
- Só atualiza o que é técnico: Corona atual, exposição, gama, mapas em falta. Nada de novos objetos.
- Se a cena já não abrir, usa a imagem antiga diretamente como referência (passo 5).

**2. Câmara (1), 4:5 ou o formato original**
- A mesma câmara do render antigo, exatamente. Se o original não for 4:5, eu faço o carrossel com a imagem inteira em branco.

**3. Luz:** decide tu o que mudarias hoje (normalmente: luz mais suave, menos saturação, sol mais baixo). Anota numa linha o que mudaste: entra na legenda.

**4. Render base:** 1600 px. Guardar a imagem antiga em "0 - antes" (com o ano no nome) e o render novo em "0 - render base".

**5. AI (Nano Banana, sobre o render novo)**
```
Photorealistic architectural photograph, same building, same geometry, same camera and composition as the reference image. Keep every wall, opening and object exactly where it is. Refine materials to be physically accurate and subtly imperfect, soft natural light with gentle falloff, believable vegetation, calm muted colour palette, natural exposure without crushed blacks or blown highlights, fine film grain, no added objects, no people.
```
Ajusta 2–3 palavras ao teu projeto (materiais, hora do dia). A composição tem de bater certo com a antiga ao píxel: é isso que faz o slider funcionar.

**6. Entrega:** em "#023 - Antes e agora / final": "1 antes AAAA" e "2 agora 2026" + uma linha em "notas.txt" (ano, o que mudaste). Eu faço o carrossel antes → agora e um reel com slider a varrer da esquerda para a direita.

**Legenda**
- EN: "Daily Study #023 · Then vs now. Same scene, same camera, [YEAR] vs 2026. What changed is everything I learned in between."
- PT: "Daily Study #023 · Antes e agora. A mesma cena, a mesma câmara, [ANO] vs 2026. O que mudou é tudo o que aprendi entretanto."

---

## #024 · Do esboço à imagem (terça, 29 dez)

**Ideia:** processo puro, muito partilhável: um esboço à mão de 2 minutos → volumetria 3D em 15 minutos → imagem final. Carrossel de 3 (esboço, clay, final) que mostra que a ideia vem antes da ferramenta.

**1. Esboço (2 min)**
- Papel e caneta (ou iPad). Uma casa pequena num lote inclinado: um volume em consola, uma parede de pedra a segurar o terreno, um pátio.
- Fotografa o esboço de cima, com luz do dia, sem sombras (vai ser o slide 1).

**2. Modelo 3D (15 min)**
- Segue o esboço à letra, mesmo o que estiver "errado": a graça é a fidelidade.
- Volume em consola 10 × 5 m (betão ou madeira, tu escolhes), muro de pedra 1,2 m de altura, pátio com uma árvore (proxy), terreno com um declive simples.

**3. Câmara (1), 4:5**
- A mesma perspetiva do esboço (põe o esboço como fundo da viewport e acerta a câmara por cima). 28–35 mm.

**4. Luz:** fim de tarde de inverno, sol baixo de lado (raking light) para o muro de pedra ganhar textura.

**5. Render base:** 1600 px. Guardar "0 - esboço" (foto), "0 - clay" e "0 - render base".

**6. AI (Nano Banana)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A small contemporary house on a sloping site in northern Portugal, a cantilevered [board-formed concrete | dark charred timber] volume over a dry-stone granite retaining wall, a small gravel courtyard with a single cork oak, low winter sun grazing the stone wall and casting long shadows, dry winter grass, soft pale sky, calm and precise, fine film grain, no people.
```
Escolhe um dos materiais entre [ ]. A AI não pode tirar a consola nem baixar o muro: é o que liga a imagem ao esboço.

**7. Entrega:** em "#024 - Esboço à imagem / final": "1 esboço", "2 clay", "3 final". Eu monto o carrossel e um reel esboço → clay → final com dissolve (8 s).

**Legenda**
- EN: "Daily Study #024. Two minutes of pen, fifteen of 3D, then light. The idea always comes before the tool."
- PT: "Daily Study #024. Dois minutos de caneta, quinze de 3D e depois luz. A ideia vem sempre antes da ferramenta."

---

## #025 · Último do ano: terraço sobre o Porto (quinta, 31 dez)

**Ideia:** a última imagem de 2026. Um terraço de cobertura no Porto, noite de passagem de ano, fogo de artifício ao longe sobre o rio. Cena noturna, simples de modelar: o céu e a cidade são da AI.

**1. Modelo 3D (15 min)**
- Terraço 8 × 5 m: deck em madeira, guarda em vidro com corrimão fino em latão, um banco corrido em betão com almofadas, 2 copos e uma garrafa num tabuleiro (caixas e cilindros chegam).
- Parede de fundo do volume de acesso em reboco claro com uma porta de vidro acesa.
- A cidade: só um plano lá em baixo e uns blocos ao longe para a perspetiva (a AI faz o Porto).

**2. Câmaras (2), 4:5**
- A: das costas do banco para o rio, 28 mm, guarda de vidro a atravessar a imagem, fogo de artifício no terço superior.
- B: pormenor do tabuleiro com os copos e as luzes da cidade desfocadas atrás, 85 mm.

**3. Luz:** noite: céu azul-escuro (não preto), luz quente da porta de vidro (2700 K), uma fita LED escondida debaixo do banco. O fogo de artifício é luz da AI, não modeles.

**4. Render base:** 1600 px. Guardar "0 - clay" e "0 - mask id" (terraço / vidro / céu / cidade).

**5. AI (Nano Banana, o mesmo prompt nas 2 câmaras)**
```
Photorealistic architectural night photograph, same space, same geometry and camera as the reference image. A rooftop terrace in Porto, Portugal, on New Year's Eve, an oak deck, a frameless glass balustrade with a thin brass handrail, a built-in concrete bench with linen cushions, a tray with two champagne glasses and a bottle, warm light from a glass door behind, the old city of Porto and the Douro river below with glowing streetlights, distant golden fireworks over the river reflected in the water, deep navy blue sky, festive but calm, fine film grain, no readable text, no people.
```
Para B acrescenta: "close-up of the tray and glasses, city lights as soft bokeh behind". O fogo de artifício tem de estar do mesmo lado nas 2 câmaras.

**6. Entrega:** 2 finais em "#025 - Terraço passagem de ano / final". Para reel: câmara A animada 5 s (LTX 2.5, fogo de artifício a rebentar devagar, reflexo no rio).

**Legenda**
- EN: "Daily Study #025. Last image of 2026. Thank you for watching all year. See you on the other side."
- PT: "Daily Study #025. A última imagem de 2026. Obrigado por acompanharem o ano todo. Vemo-nos do outro lado."

---

## #026 · Uma divisão, 4 estilos (sábado, 2 jan)

**Ideia:** o primeiro do ano. A mesma sala, a mesma câmara, a mesma luz, e quatro estilos: suíço, japandi, brutalista, mediterrânico. Carrossel de 4 + pergunta aos seguidores (gera comentários).

**1. Modelo 3D (15 min)**
- Sala 5 × 4 m, pé-direito 2,8 m, uma janela grande a toda a largura de uma parede, uma porta.
- Só volumes neutros: um sofá (caixa), uma mesa baixa, uma estante baixa, um candeeiro de pé. Tudo em material cinzento: os estilos são da AI.

**2. Câmara (1, fixa), 4:5**
- Do canto, 24 mm, altura 1,2 m, janela à esquerda. Não mexer entre versões.

**3. Luz:** manhã de inverno, luz suave pela janela, sem sol direto (para os 4 estilos serem comparáveis).

**4. Render base:** 1600 px, clay. Guardar "0 - clay" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt base, só muda a parte entre [ ])**
```
Photorealistic interior photograph, same room, same geometry, same furniture positions, same camera and same soft window light as the reference image. A calm living room in [Swiss minimalist style: white oak, pale lime plaster, light grey linen, precise details | Japandi style: light ash wood, paper lamp, warm beige linen, low furniture, a bonsai | brutalist style: board-formed concrete walls, dark walnut, black leather, a sculptural stone lamp | Mediterranean style: whitewashed curved plaster, terracotta floor, rattan, olive branches in a clay vase], soft winter morning light, quiet and lived-in, fine film grain, no people.
```
Regra: o sofá, a mesa, a estante e o candeeiro têm de ficar no mesmo sítio e tamanho nas 4. Se a AI mexer, usa o render base + mask id dos móveis.

**6. Entrega:** 4 finais em "#026 - Uma divisão 4 estilos / final" ("1 suico", "2 japandi", "3 brutalista", "4 mediterranico"). Eu faço o carrossel com o nome do estilo em cada slide e um reel com wipe entre os 4.

**Legenda**
- EN: "Daily Study #026. One room, one camera, four styles: Swiss, Japandi, brutalist, Mediterranean. Which one would you live in? 1, 2, 3 or 4?"
- PT: "Daily Study #026. Uma divisão, uma câmara, quatro estilos: suíço, japandi, brutalista, mediterrânico. Em qual vivias? 1, 2, 3 ou 4?"

---

## #027 · Casas de Portugal #3: Alentejo (terça, 5 jan)

**Ideia:** terceira casa da série. Um monte alentejano contemporâneo, cal branca e barras azuis, campos verdes de inverno, sobreiros, luz baixa e limpa de janeiro. Depois do Douro (terra) e da Serra (neve), o Alentejo (luz).

**1. Modelo 3D (20 min)**
- Terreno quase plano com uma ondulação suave.
- Casa térrea comprida 30 × 6 m, cobertura de duas águas baixa em telha (só o volume), paredes grossas (50 cm), poucos vãos pequenos e fundos, uma chaminé alentejana grande e quadrada.
- Um alpendre em consola de betão numa ponta, virado a sul, e um tanque de rega retangular (piscina) à frente.
- Sobreiros (proxies) espalhados, 3–4.

**2. Câmaras (3), 4:5**
- A: muito de longe, 85 mm, a casa como uma linha branca na paisagem, céu a ocupar metade.
- B: três quartos a 20 m, 35 mm, alpendre e tanque em primeiro plano.
- C: debaixo do alpendre para a planície, 24 mm, sombra forte no chão.

**3. Luz:** meio da manhã de janeiro, sol baixo e limpo, céu azul com poucas nuvens altas. Sombras longas e nítidas; a cal tem de "queimar" um pouco sem perder textura.

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (casa / tanque / terreno / árvores / céu) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A contemporary Alentejo farmhouse in southern Portugal, a long single-storey volume with thick whitewashed walls and a faded blue painted base, a low terracotta tile gable roof, a large square Alentejo chimney, small deep-set windows, a cantilevered concrete porch and a rectangular water tank reflecting the sky, gently rolling bright green winter fields, scattered cork oaks with dark trunks, low clear January sun with long crisp shadows, pale blue sky with a few high clouds, quiet and timeless, fine film grain, no people.
```
Para C acrescenta: "view from under the porch towards the plains, strong shadow on the floor". A barra azul e a chaminé têm de ser iguais nas 3.

**6. Entrega:** 3 finais em "#027 - Casas de Portugal Alentejo / final". Para reel: câmara A em zoom lento (eu faço) ou câmara B animada 5 s (LTX 2.5, reflexo da água e nuvens a passar).

**Legenda**
- EN: "Daily Study #027 · Houses of Portugal #3: Alentejo. Lime, light and a lot of horizon."
- PT: "Daily Study #027 · Casas de Portugal #3: Alentejo. Cal, luz e muito horizonte."

---

## #028 · Do clay ao final em 4 passos (quinta, 7 jan)

**Ideia:** mostrar o processo, que é o que mais gente guarda. Uma casa-pátio pequena e o mesmo enquadramento em 4 fases: clay → render base → AI → final editado. Carrossel de 4 + reel com wipe.

**1. Modelo 3D (15 min)**
- Casa-pátio térrea 12 × 12 m com um pátio central 5 × 5 m; muros altos (3 m) sem janelas para fora.
- Para o pátio: uma parede toda em vidro com caixilho fino, um banco em pedra corrido, uma oliveira (proxy) no centro, chão em lajes grandes.
- Uma abertura no muro (porta pivotante) para se perceber a entrada.

**2. Câmara (1, fixa), 4:5**
- Dentro do pátio, de um canto, 24 mm, altura 1,5 m: oliveira no terço direito, parede de vidro ao fundo, céu em cima. Não mexer entre fases.

**3. Luz:** fim de manhã de inverno, sol baixo a entrar por cima do muro: metade do pátio ao sol, metade à sombra (a linha de sombra no chão é a imagem).

**4. Render base:** 1600 px. Guardar "0 - clay" (material branco, a mesma luz), "0 - render base" (materiais simples) e "0 - mask id" (muros / vidro / chão / árvore / céu).

**5. AI (Nano Banana, sobre o render base)**
```
Photorealistic architectural photograph, same building, same geometry, same camera and same sunlight as the reference image. A small contemporary courtyard house in northern Portugal, tall lime-plastered walls in warm off-white, a full-height glass wall with slim bronze frames, a long built-in granite bench, large pale limestone floor slabs, a single old olive tree in the centre, low winter sun cutting a sharp diagonal shadow across the floor, clear pale sky, calm and quiet, fine film grain, no people.
```
Depois edita (Photoshop/Lightroom): corrige verticais, um pouco de contraste local na sombra, grão final igual ao das outras séries.

**6. Entrega:** 4 imagens em "#028 - Clay ao final / final", com nomes "1 clay", "2 render base", "3 ai", "4 final". Eu faço o carrossel com a etiqueta de cada passo e um reel com wipe da esquerda para a direita entre as 4.

**Legenda**
- EN: "Daily Study #028. Clay → base render → AI → final. Same camera, four steps. The 3D does the geometry and the light; the AI and the edit do the rest."
- PT: "Daily Study #028. Clay → render base → AI → final. A mesma câmara, quatro passos. O 3D faz a geometria e a luz; a AI e a edição fazem o resto."

---

## #029 · Casa para um cliente imaginário: o surfista (sábado, 9 jan)

**Ideia:** início de uma mini-série "Clientes imaginários". Uma casa pequena na Ericeira para um surfista: garagem/oficina para as pranchas, duche exterior, vista para o mar. Contar a história do cliente na legenda.

**1. Modelo 3D (20 min)**
- Terreno em encosta suave virado ao mar (um plano inclinado + um plano de água ao fundo).
- Dois volumes: em baixo, um embasamento em betão (oficina, portão largo aberto); em cima, uma caixa em madeira 10 × 5 m com um vão a toda a largura virado ao mar e um terraço.
- Duche exterior encostado ao betão (um tubo e uma base), uma prateleira com 3 pranchas (caixas finas e compridas).

**2. Câmaras (3), 4:5**
- A: da praia/encosta, 35 mm, a casa inteira com o mar à direita.
- B: o portão da oficina aberto com as pranchas, 28 mm, à altura dos olhos.
- C: do terraço para o mar, 24 mm, guarda baixa e horizonte a um terço.

**3. Luz:** fim de tarde de janeiro, sol baixo vindo do mar, contraluz suave; um pouco de neblina do mar (humidade) para dar profundidade.

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (betão / madeira / pranchas / terreno / mar / céu) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A small surfer's house in Ericeira on the Portuguese Atlantic coast: a raw board-formed concrete base with a wide open workshop door, three surfboards on a wooden rack, an outdoor shower against the concrete, above it a timber box clad in weathered vertical pine boards with a full-width window facing the ocean, a terrace with a low railing, dune grass and coastal shrubs on a gentle slope, the Atlantic ocean with soft waves, low late-afternoon winter sun from the sea, light sea mist, warm and relaxed, fine film grain, no people.
```
Para B acrescenta: "close view of the open workshop with surfboards, wetsuit hanging, sand on the floor". As pranchas têm de ter as mesmas cores nas 3.

**6. Entrega:** 3 finais em "#029 - Cliente surfista / final". Para reel: câmara C animada 5 s (LTX 2.5, ondas a rebentar, neblina a passar).

**Legenda**
- EN: "Daily Study #029 · Imaginary clients #1: the surfer. Up at six, in the water by seven. A workshop for the boards below, a timber box for the view above. Ericeira, Portugal."
- PT: "Daily Study #029 · Clientes imaginários #1: o surfista. Acorda às seis, está na água às sete. Em baixo, uma oficina para as pranchas; em cima, uma caixa de madeira para a vista. Ericeira."

---

## #030 · Uma planta simples → interior completo (terça, 12 jan)

**Ideia:** mostrar que leio uma planta e a transformo em espaço. Um T1 de 45 m² desenhado em 2 minutos (planta a preto e branco) → 3 imagens do interior. O 1.º slide é a própria planta, com as câmaras marcadas.

**1. Planta (5 min, no 3ds Max ou à mão)**
- T1 retangular 9 × 5 m: entrada a meio do lado comprido; à esquerda sala + cozinha em linha (5 × 5 m); à direita quarto (4 × 3 m) e casa de banho (4 × 2 m).
- Uma janela grande na sala, uma no quarto. Exporta a planta como imagem limpa (linhas pretas em fundo branco) e marca as câmaras A, B, C com setas.

**2. Modelo 3D (15 min)**
- Extrusão das paredes a 2,7 m, vãos, cozinha em linha (caixas), sofá, mesa de jantar redonda, cama, um armário de parede inteira entre sala e quarto.

**3. Câmaras (3), 4:5**
- A: da entrada para a sala e janela, 24 mm.
- B: da sala para a cozinha em linha, 28 mm.
- C: no quarto, da porta para a cama e janela, 24 mm.

**4. Luz:** manhã, sol a entrar pela janela da sala em ângulo (manchas no chão), quarto em luz suave.

**5. Render base:** 1600 px. Guardar "0 - clay", "0 - render base" e a planta em "0 - planta".

**6. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same apartment, same geometry, same furniture layout and camera as the reference image. A compact one-bedroom flat in Lisbon, white walls, a warm oak herringbone floor, a linear kitchen in pale oak with a thin stone worktop, a round oak dining table with four chairs, a low linen sofa, a full-height built-in oak wardrobe between living room and bedroom, morning sun entering at an angle and drawing patches of light on the floor, a few books and a ceramic vase, calm and lived-in, fine film grain, no people.
```
Regra: o soalho e a madeira da cozinha e do armário têm de ser os mesmos nas 3 (usa a mask id dos móveis se a AI mudar).

**7. Entrega:** a planta + 3 finais em "#030 - Planta ao interior / final" ("0 planta", "A sala", "B cozinha", "C quarto"). Eu faço o carrossel com a planta primeiro e a seta da câmara em cada slide.

**Legenda**
- EN: "Daily Study #030. A 45 m² plan drawn in two minutes, then walked through in 3D. Plan first, three cameras after. Small flats deserve good light too."
- PT: "Daily Study #030. Uma planta de 45 m² desenhada em dois minutos e depois percorrida em 3D. Primeiro a planta, depois três câmaras. As casas pequenas também merecem boa luz."

---

## #031 · Uma pintura como espaço: a luz de Vermeer (quinta, 14 jan)

**Ideia:** pegar na luz de uma pintura em domínio público ("A Leiteira", Vermeer, c. 1658) e fazer um interior contemporâneo com a mesma luz: janela à esquerda, luz fria do norte, parede caiada, sombras suaves. Não é copiar o quadro: é o ambiente. No carrossel, uma referência à pintura no texto (sem pôr a imagem do quadro).

**1. Modelo 3D (15 min)**
- Canto de cozinha 4 × 3 m, pé-direito 3 m: uma janela de madeira com caixilho em quadrícula na parede esquerda, alta, perto do canto.
- Uma mesa de madeira maciça junto à janela, um banco, uma prateleira simples na parede do fundo.
- Objetos: um jarro, uma taça, um pão (cilindros e esferas chegam).

**2. Câmaras (2), 4:5**
- A: frontal à parede do fundo, 50 mm, janela a entrar pela esquerda, mesa no terço inferior.
- B: pormenor da mesa com o jarro e a luz a rasar, 85 mm.

**3. Luz:** só a janela. Luz do norte, fria e difusa, sem sol direto; caindo da esquerda e a morrer para a direita. Nada de luz artificial. A parede do fundo tem de ter gradação (clara junto à janela, escura do outro lado).

**4. Render base:** 1600 px. Guardar "0 - clay" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 2 câmaras)**
```
Photorealistic interior photograph, same room, same geometry and camera as the reference image. A quiet contemporary kitchen corner with the light of a seventeenth-century Dutch interior painting: a tall wooden window with small square panes on the left, cool diffuse north light falling across a rough lime-washed wall that fades from bright to deep shadow, a heavy worn oak table with a ceramic jug, an earthenware bowl and a loaf of bread, a simple wooden shelf, muted palette of ochre, ultramarine blue and warm white, deep soft shadows, stillness, fine film grain, no people.
```
Para B acrescenta: "close-up of the jug and bread, grazing window light revealing the texture of the table". A janela tem de estar sempre à esquerda.

**6. Entrega:** 2 finais em "#031 - Luz de Vermeer / final". Para reel: câmara A em zoom lento (eu faço), quase parada.

**Legenda**
- EN: "Daily Study #031. Borrowing the light of Vermeer's The Milkmaid (c. 1658): one north window, a lime wall, nothing else. Some light is 360 years old and still works."
- PT: "Daily Study #031. A luz d'A Leiteira de Vermeer (c. 1658) emprestada a uma cozinha de hoje: uma janela a norte, uma parede caiada e mais nada. Há luz com 360 anos que continua a funcionar."

---

## #032 · Casas de Portugal #4: Gerês (sábado, 16 jan)

**Ideia:** quarta casa da série. Depois do Douro, Serra da Estrela e Alentejo: o Gerês. Granito, musgo, nevoeiro, um rio de montanha. Uma casa de pedra contemporânea meio enterrada na encosta, num dia de chuva fina.

**1. Modelo 3D (20 min)**
- Encosta com socalcos de pedra (2–3 degraus de terreno) e grandes blocos de granito (esferas/caixas deformadas).
- Casa: volume comprido 16 × 5 m encaixado no socalco, paredes em pedra (só o volume), cobertura plana verde (relva), um vão grande a toda a altura num topo, virado ao vale.
- Um caminho de lajes até à porta, um muro de pedra seca.

**2. Câmaras (3), 4:5**
- A: do vale para cima, 50 mm, a casa pequena na encosta, nevoeiro a cortar a montanha atrás.
- B: três quartos junto ao caminho de lajes, 28 mm, pedra molhada em primeiro plano.
- C: de dentro, pelo vão grande, para o vale com nevoeiro, 24 mm, uma lareira acesa fora de campo (só a luz quente).

**3. Luz:** dia de chuva fina, céu branco-cinza, sem sombras duras; dentro, luz quente da lareira (2400 K). É uma imagem de ambiente, não de sol.

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (casa / pedra / terreno / vegetação / céu) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A contemporary stone house in the Gerês mountains of northern Portugal, a long low volume of rough grey granite set into terraced hillside, a green grass roof, one full-height window facing the valley with warm firelight inside, a path of wet granite slabs, dry-stone walls covered in moss, huge granite boulders, ferns and oak trees, low clouds and mist drifting across the mountains, fine drizzle, wet reflective surfaces, soft overcast light, deep greens and greys, quiet and remote, fine film grain, no people.
```
Para C acrescenta: "view from inside through the large window towards the misty valley, warm interior light on the window frame". O nevoeiro tem de vir do mesmo lado nas 3.

**6. Entrega:** 3 finais em "#032 - Casas de Portugal Geres / final". Para reel: câmara A animada 5 s (LTX 2.5, nevoeiro a passar devagar, chuva fina).

**Legenda**
- EN: "Daily Study #032 · Houses of Portugal #4: Gerês. Granite, moss and a fire inside while the mountain disappears in the fog."
- PT: "Daily Study #032 · Casas de Portugal #4: Gerês. Granito, musgo e uma lareira acesa enquanto a serra desaparece no nevoeiro."

---

## #033 · Desafio de cor #1: terracota (terça, 19 jan)

**Ideia:** nova mini-série, uma cor por mês. Um espaço monocromático todo em terracota: paredes, chão, banco, até a luz puxa para o quente. Termina com pergunta aos seguidores: qual a próxima cor (voto nos comentários → eu ponho no Painel).

**1. Modelo 3D (15 min)**
- Divisão 5 × 5 m com um nicho arqueado numa parede, um banco embutido em curva, uma claraboia redonda no teto.
- Um vaso grande e uma bacia (formas simples). Nada mais.

**2. Câmaras (2), 4:5**
- A: frontal ao nicho, 35 mm, o círculo de luz da claraboia no chão em primeiro plano.
- B: pormenor do banco curvo e do vaso, 70 mm.

**3. Luz:** sol a entrar pela claraboia, círculo de luz nítido no chão; o resto em luz rebatida quente (a própria cor ilumina o espaço).

**4. Render base:** 1600 px. Guardar "0 - clay" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 2 câmaras)**
```
Photorealistic interior photograph, same room, same geometry and camera as the reference image. A monochrome room entirely in terracotta: smooth terracotta lime plaster walls, an arched niche, a curved built-in bench, a polished terracotta tile floor, a large unglazed clay vessel and a shallow clay basin, all in the same burnt-orange family, a round skylight casting a sharp circle of sunlight on the floor, warm bounced light filling the room, subtle tonal variations, serene and sculptural, fine film grain, no people.
```
Regra: tudo na mesma família de cor; se a AI meter branco, cinza ou madeira, repete com "no white, no grey, no wood".

**6. Entrega:** 2 finais em "#033 - Cor terracota / final". Eu faço o carrossel com uma amostra da cor (nome + código HEX tirado da imagem) no último slide.

**Legenda**
- EN: "Daily Study #033 · Colour challenge #1: terracotta. One room, one colour, one circle of sun. Next month's colour is yours: write it in the comments."
- PT: "Daily Study #033 · Desafio de cor #1: terracota. Uma divisão, uma cor, um círculo de sol. A cor do próximo mês é vossa: escrevam-na nos comentários."

---

## #034 · A sombra é a protagonista: parede de tijolo vazado (quinta, 21 jan)

**Ideia:** uma parede de tijolo vazado (cobogó / tijolo em grelha, muito português dos anos 60–70) e o desenho de luz que projeta num corredor branco. A arquitetura é a sombra.

**1. Modelo 3D (15 min)**
- Corredor exterior coberto 8 × 2,2 m, pé-direito 2,6 m, paredes e chão em branco/betão claro.
- Um dos lados todo em tijolo vazado: grelha de blocos 20 × 20 × 10 cm com furo quadrado ou em cruz (um bloco, depois Array).
- Ao fundo, uma porta de madeira e um vaso com uma planta alta.

**2. Câmaras (3), 4:5**
- A: ao longo do corredor, 28 mm, altura 1,5 m, o padrão de sombra a correr no chão e na parede.
- B: frontal à grelha, de dentro, 50 mm, o sol recortado nos furos.
- C: pormenor do padrão no chão com um pé de vaso a entrar no plano, 85 mm.

**3. Luz:** Corona Sun, elevação ~35°, azimute rasante à grelha (o padrão estica em losangos). Céu limpo. Contraste forte, sombras nítidas.

**4. Render base:** 1600 px. Guardar "0 - clay" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A covered outdoor corridor with one side made of a white ceramic breeze-block screen wall, mid-century Portuguese style, strong late-morning sun projecting a sharp repeating geometric shadow pattern across a pale polished concrete floor and a white lime-plaster wall, a natural wood door at the end, one tall potted plant, crisp high-contrast light, clean and graphic, fine film grain, no people.
```
Regra: o padrão de sombra tem de bater certo com a geometria da grelha nas 3 imagens; se a AI inventar outro desenho, baixa a força (denoise) e repete.

**6. Entrega:** 3 finais em "#034 - Tijolo vazado / final". Para reel: câmara A em timelapse 5 s (o padrão a deslizar no chão, LTX 2.5).

**Legenda**
- EN: "Daily Study #034 · The shadow is the architecture. A breeze-block wall, a white corridor and the sun drawing on the floor."
- PT: "Daily Study #034 · A sombra é a arquitetura. Uma parede de tijolo vazado, um corredor branco e o sol a desenhar no chão."

---

## #035 · Casa para um cliente imaginário #2: a ceramista (sábado, 23 jan)

**Ideia:** segunda da série "clientes imaginários". Uma ceramista em Barcelos: casa pequena + atelier com forno, ligados por um pátio. Tudo gira à volta das mãos e do barro.

**1. Modelo 3D (20 min)**
- Dois volumes de um piso (casa 10 × 6 m, atelier 6 × 6 m) com cobertura de duas águas em telha, ligados por um pátio de 6 × 6 m com uma oliveira (ou deixas a árvore para a AI).
- Atelier: janelão a norte, bancada comprida, prateleiras com peças (cilindros e esferas simples), um forno (caixa com porta).
- Paredes caiadas, caixilharia em madeira escura.

**2. Câmaras (3), 4:5**
- A: exterior, do pátio para o atelier, 35 mm, oliveira em primeiro plano.
- B: dentro do atelier, 28 mm, bancada e prateleiras cheias de peças, luz de norte.
- C: pormenor das prateleiras com peças por cozer, 70 mm, profundidade de campo curta.

**3. Luz:** fim de tarde de inverno, sol baixo no exterior; no atelier luz difusa de norte (sem sol direto), muito suave.

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (edifício / pátio / peças / vegetação) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A small house and ceramics studio for a potter in northern Portugal, two whitewashed single-storey volumes with clay tile pitched roofs and dark timber windows around a gravel courtyard with an old olive tree, inside the studio a long worktable with clay dust, a potter's wheel, wooden shelves full of unfired grey and terracotta pots and bowls, a small kiln, soft north light, handmade, warm and lived-in, fine film grain, no people.
```
Para C acrescenta: "close-up of the shelves, shallow depth of field, fingerprints visible on the raw clay". As peças nas prateleiras têm de ser as mesmas em B e C.

**6. Entrega:** 3 finais em "#035 - Cliente ceramista / final". Eu escrevo no último slide o "programa" da cliente (3 linhas), como num concurso.

**Legenda**
- EN: "Daily Study #035 · Imaginary client #2: a potter in Barcelos. A small house, a studio with north light and a courtyard to dry the pieces in the sun."
- PT: "Daily Study #035 · Cliente imaginário #2: uma ceramista em Barcelos. Uma casa pequena, um atelier com luz de norte e um pátio para secar as peças ao sol."

---

## #036 · Produto na natureza: um relógio numa pedra molhada (terça, 26 jan)

**Ideia:** um anúncio de produto sem estúdio. Um relógio de pulso pousado numa laje de pedra junto a um ribeiro, gotas de água, luz da manhã. Mostra o lado "Product CGI" do portfólio.

**1. Modelo 3D (20 min)**
- Relógio simples: caixa cilíndrica 40 mm, aro, mostrador liso com 3 ponteiros e índices (Chamfer em tudo), bracelete em pele (2 caixas curvadas com Bend). Sem marcas nem logótipos.
- Laje de pedra irregular (caixa com Noise) e uma segunda pedra desfocada atrás.

**2. Câmaras (3)**
- A: hero, 100 mm macro, baixa e quase rasante, relógio a 3/4, 4:5.
- B: de cima (flat lay), 85 mm, relógio + pedra + folhas, 4:5.
- C: macro do mostrador com gotas, 100 mm, f/2.8 no Corona, 4:5.

**3. Luz:** sol de manhã, baixo, por trás e de lado (contraluz) para brilhos no vidro e no metal; um rebatedor branco do lado da câmara.

**4. Render base:** 2000 px (é produto, precisa de nitidez). Materiais: aço escovado, vidro de safira com reflexo, pele castanha. Guardar "0 - clay", "0 - mask id" (relógio / pedra / fundo) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic luxury product photograph, same object, same geometry and camera as the reference image. A minimalist steel wristwatch with a plain dial and brown leather strap resting on a wet dark river stone beside a mountain stream, small water droplets on the sapphire crystal and the stone, low morning backlight creating crisp highlights on the brushed steel, soft out-of-focus water and green moss in the background, high-end advertising look, ultra sharp detail, no text, no logo, no brand name, no people.
```
Regra: o relógio nunca pode mudar (nº de índices, ponteiros, coroa). Se mudar, faz a AI só ao fundo com o mask ID e mantém o relógio do render.

**6. Entrega:** 3 finais em "#036 - Relogio na pedra / final". Para reel: câmara A com água a correr atrás, 5 s (Seedance, câmara parada).

**Legenda**
- EN: "Daily Study #036 · Product out of the studio. A watch, a wet stone and the first light of the morning. 3D model, AI world around it."
- PT: "Daily Study #036 · Produto fora do estúdio. Um relógio, uma pedra molhada e a primeira luz da manhã. Modelo 3D, o mundo à volta em AI."

---

## #037 · Casa de banho em pedra: um spa em casa (quinta, 28 jan)

**Ideia:** um interior que vende sempre. Casa de banho toda em pedra clara (travertino), banheira de pedra maciça, janela para um jardim pequeno. Silêncio, vapor, luz suave.

**1. Modelo 3D (20 min)**
- Divisão 4 × 3,5 m, pé-direito 2,7 m. Banheira monolítica 1,7 × 0,8 m (caixa com Boolean e cantos arredondados) junto a uma janela baixa e larga.
- Bancada flutuante com lavatório em pedra, espelho redondo, um banco de madeira.
- Lá fora: um muro e uma árvore pequena (ou jardim pela AI).

**2. Câmaras (3), 4:5**
- A: geral, 24 mm, banheira em primeiro plano e janela ao fundo.
- B: lavatório e espelho, 50 mm, de frente.
- C: pormenor da borda da banheira com toalha dobrada e vapor, 85 mm.

**3. Luz:** dia nublado claro; luz entra só pela janela, suave e lateral; uma pequena luz quente escondida por baixo da bancada (2700 K).

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (pedra / madeira / vidro / exterior) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same room, same geometry and camera as the reference image. A serene bathroom entirely in honed cream travertine: walls, floor and a solid monolithic stone bathtub under a wide low window looking onto a small green walled garden, a floating travertine vanity with a carved stone basin, a round mirror, a simple oak stool, a folded linen towel, a thin wisp of steam above the water, soft diffused daylight from the window, a faint warm glow under the vanity, calm spa atmosphere, natural stone texture with visible pores, fine film grain, no people.
```
Regra: o veio e os poros do travertino têm de ser os mesmos nas 3; se a AI trocar de pedra, refaz só com o mask ID da pedra.

**6. Entrega:** 3 finais em "#037 - Casa de banho travertino / final". Para reel: câmara C, 5 s, vapor a subir devagar (LTX 2.5).

**Legenda**
- EN: "Daily Study #037 · A stone bathroom as a spa. Travertine everywhere, one window, a little steam. 3D base, AI finish."
- PT: "Daily Study #037 · Uma casa de banho em pedra como um spa. Travertino em tudo, uma janela, um pouco de vapor. Base 3D, acabamento AI."

---

## #038 · Casas de Portugal #5: Açores (sábado, 30 jan)

**Ideia:** quinta casa da série. Depois do Douro, Estrela, Alentejo e Gerês: São Miguel. Basalto negro, paredes brancas, hortênsias, muros de pedra negra a dividir pastos verdes e o Atlântico ao fundo.

**1. Modelo 3D (20 min)**
- Terreno inclinado para o mar, com muros baixos de pedra a dividir parcelas (caixas compridas).
- Casa: dois volumes simples 12 × 5 m e 6 × 5 m em L, paredes brancas com cunhais e molduras em basalto (faixas escuras), cobertura de duas águas em telha.
- Um grande vão envidraçado virado ao mar no volume maior.

**2. Câmaras (3), 4:5**
- A: geral desde o pasto acima da casa, 35 mm, casa + muros + oceano no horizonte.
- B: três quartos junto ao muro de basalto com hortênsias em primeiro plano, 28 mm.
- C: de dentro, pelo vão, para o mar, 24 mm.

**3. Luz:** típico açoriano: céu com nuvens grandes e rasgos de sol, luz que muda; sol a sair de trás de uma nuvem, mar a brilhar.

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (casa / basalto / terreno / vegetação / céu / mar) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A contemporary farmhouse on São Miguel island in the Azores, white lime walls with black volcanic basalt corners and window frames, clay tile pitched roof, one large window facing the Atlantic ocean, low black basalt dry-stone walls dividing bright green pastures down to the sea, blue and violet hydrangea hedges, dramatic sky with big cumulus clouds and breaks of sunlight, the ocean glittering on the horizon, fresh humid air, deep greens, fine film grain, no people.
```
Regra: as nuvens e o sol do mesmo lado nas 3; hortênsias sempre azuis/violeta (são as dos Açores).

**6. Entrega:** 3 finais em "#038 - Casas de Portugal Acores / final". Para reel: câmara A animada 5 s, sombras das nuvens a passar pelos pastos (LTX 2.5).

**Legenda**
- EN: "Daily Study #038 · Houses of Portugal #5: Azores. White walls, black basalt, blue hydrangeas and the whole Atlantic in front."
- PT: "Daily Study #038 · Casas de Portugal #5: Açores. Paredes brancas, basalto negro, hortênsias azuis e o Atlântico inteiro à frente."

---

## #039 · Um plano, 10 segundos: entrar pela porta (terça, 2 fev)

**Ideia:** o primeiro Daily Study pensado como VÍDEO. Uma câmara que avança devagar do exterior, passa a porta e revela a sala. Mostra o lado "AI Video" (o reel é o produto principal; as imagens são frames).

**1. Modelo 3D (20 min)**
- Reaproveita a casa de um Daily Study anterior (sugestão: #029 surfista ou #035 ceramista) → menos trabalho e cria continuidade na série.
- Porta de entrada aberta, hall curto, sala com janela grande ao fundo.

**2. Câmara (1 animada) + 3 stills**
- Animação no 3ds Max: câmara a 1,6 m, 24 mm, percurso reto de 6 m durante 10 s (a passar a porta aos ~4 s), velocidade constante, sem rotação. Render só a 1.ª e a última frame em 1600 px (16:9 e 9:16).
- Stills 4:5: frame inicial (exterior), frame do meio (na porta), frame final (sala).

**3. Luz:** fim de tarde, sol a entrar pela janela do fundo (a sala "acende-se" quando a câmara entra).

**4. Render base:** primeira e última frame + clay da animação (playblast) para guiar o vídeo. Guardar em "0 - render base" e "0 - clay"; o vídeo final em "anim".

**5. AI**
- Stills: Nano Banana com o prompt da casa original (mesmo texto do Daily Study que reaproveitares) + "golden late afternoon light".
- Vídeo: Seedance (primeira + última frame já tratadas pela AI) ou LTX 2.5 com o playblast como guia:
```
Slow steady dolly forward, camera at eye height, moving from the garden through the open front door into the living room, constant speed, no rotation, no cuts, warm late afternoon sun streaming through the large window at the end of the room, dust particles in the light, photorealistic architectural film, fine film grain, no people.
```
Regra: se o vídeo deformar a porta ou as paredes, encurta para 5 s ou usa o clay como controlo (ComfyUI).

**6. Entrega:** vídeo em "#039 - Entrar pela porta / anim" (16:9 e 9:16) + 3 stills em "final". Eu monto o reel (som, título, assinatura) com o robô de vídeo e o carrossel das 3 frames.

**Legenda**
- EN: "Daily Study #039 · One shot, ten seconds: walking in. 3D camera path, AI light and film. Sound on."
- PT: "Daily Study #039 · Um plano, dez segundos: entrar em casa. Percurso de câmara em 3D, luz e filme em AI. Com som."

---

Lembretes: briefing do dia seguinte enviado segunda, quarta e sexta à noite. Mais ideias no dossier e em docs/content-plan.yml, calendarizadas por mim (próximo lote #040–#045, 4–16 fev, até 31 jan).
