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

## #040 · Desafio de cor #2: a cor que vocês escolheram (quinta, 4 fev)

**Ideia:** cumprir a promessa do #033 ("a cor do próximo mês é vossa"). Usa a cor mais pedida nos comentários do #033; se não houver votos claros, usa verde-salva (sage). Mesma regra do #1: uma divisão, uma cor em tudo, um raio de sol.

**1. Modelo 3D (15 min)**
- Reaproveita a divisão do #033 (mesmas paredes, mesma janela) → a série fica comparável lado a lado.
- Troca só os objetos: uma chaise longue simples (caixas com Chamfer), uma mesa baixa redonda, uma jarra.
- Paredes, chão, teto e móveis: tudo na mesma cor (variar só o brilho: parede mate, móvel acetinado, jarra brilhante).

**2. Câmaras (3), 4:5**
- A: geral, 28 mm, frontal, simétrica (a mesma do #033, para o "lado a lado").
- B: a 45°, 40 mm, a chaise com o raio de sol a cair no assento.
- C: pormenor da jarra e da sombra na parede, 85 mm.

**3. Luz:** sol baixo (~12°) por uma janela pequena, a desenhar uma mancha nítida na parede; resto da sala em luz refletida da própria cor (é isso que dá o "banho" de cor).

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (paredes / chão / móveis / jarra) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras; troca SAGE GREEN pela cor escolhida)**
```
Photorealistic interior photograph, same room, same geometry and camera as the reference image. A monochrome room entirely in SAGE GREEN: walls, floor, ceiling and furniture all in the same hue with different finishes, matte lime-wash walls, a satin upholstered chaise longue, a round low table, a glossy ceramic vase, one sharp patch of low warm sunlight on the wall from a small window, the rest of the room lit by soft bounced coloured light, calm editorial interior photography, fine film grain, no people, no text.
```
Regra: a cor tem de ser exatamente a mesma nas 3 (confirma com o conta-gotas no Photoshop; corrige com Hue/Saturation só na máscara das paredes).

**6. Entrega:** 3 finais em "#040 - Desafio de cor 2 / final". Eu faço o carrossel extra "#033 vs #040" (mesma câmara A, lado a lado) e a story com "obrigado por votarem".

**Legenda**
- EN: "Daily Study #040 · Colour challenge #2: you chose it, I built it. One room, one colour, one ray of sun. Next colour? Comments."
- PT: "Daily Study #040 · Desafio de cor #2: vocês escolheram, eu construí. Uma divisão, uma cor, um raio de sol. Próxima cor? Comentários."

---

## #041 · Abecedário arquitetónico #1: A de Arco (sábado, 6 fev)

**Ideia:** começa uma série nova e fácil de continuar (26 letras = meses de conteúdo). Cada letra é um elemento de arquitetura mostrado sozinho, limpo, quase escultura. A = Arco.

**1. Modelo 3D (15 min)**
- Uma galeria de 5 arcos de volta perfeita em reboco branco (vão 2,4 m, altura 3,6 m, pilares 0,5 m), em linha, sobre um pátio de lajes de pedra.
- Atrás dos arcos: uma parede lisa (ou um céu, decide a AI).
- Nada mais.

**2. Câmaras (3), 4:5**
- A: frontal, simétrica, 35 mm, todos os arcos.
- B: em fuga, por dentro da galeria, 24 mm, a ver os arcos a repetirem-se e as sombras no chão.
- C: um só arco de perto, 50 mm, com a luz a recortar a curva.

**3. Luz:** sol de meio da manhã, lateral (~35°), para as sombras dos arcos desenharem curvas no chão.

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (arcos / chão / fundo) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same geometry and camera as the reference image. A quiet arcade of five white lime-plaster semicircular arches over a pale limestone courtyard, Mediterranean light, crisp curved shadows of the arches drawn across the stone floor, subtle plaster texture with hand-made imperfections, clear soft blue sky, minimal and sculptural, architectural photography in the style of a design magazine, fine film grain, no people, no text.
```
Regra: o número de arcos e a proporção não podem mudar (conta-os nas 3 imagens).

**6. Entrega:** 3 finais em "#041 - Abecedario A Arco / final". Eu ponho um "A" discreto na tipografia da marca (Visby CF) no canto do 1.º slide, igual em todas as letras da série.

**Legenda**
- EN: "Daily Study #041 · Architecture alphabet #1: A is for Arch. Five arches, one courtyard, the shadows do the rest. B next."
- PT: "Daily Study #041 · Abecedário arquitetónico #1: A de Arco. Cinco arcos, um pátio, as sombras fazem o resto. A seguir, o B."

---

## #042 · O meu bairro #1: uma rua de Penafiel (terça, 9 fev)

**Ideia:** (dia de Carnaval) levar o archviz para casa. Tira tu uma foto de uma rua ou largo de Penafiel (de dia, a direito, sem pessoas em primeiro plano) e reimagina-a: os mesmos edifícios, mas com a luz e o acabamento de uma imagem de concurso. Mostra que a tua técnica funciona sobre o mundo real.

**1. Modelo 3D (20 min)**
- Foto tua com o telemóvel (0,5× não; usa 1×), de pé, câmara direita (sem inclinar para cima).
- No 3ds Max: põe a foto como fundo, faz o "camera match" (Perspective Match) e modela só caixas simples dos volumes principais (fachadas, passeio, rua). Não precisa de pormenor: serve para luz, sombras e máscaras.

**2. Câmaras (2 + 1)**
- A: a câmara da tua foto, 4:5.
- B: a mesma rua 2 m ao lado, um pouco mais baixa (1,2 m), 4:5 — a AI completa a partir da A.
- C: a foto original sem nada (para o slide "antes").

**3. Luz:** fim de tarde de inverno, sol baixo a bater numa das fachadas, a outra em sombra azulada; candeeiros de rua a acender.

**4. Render base:** 1600 px das caixas com sol (só para as sombras). Guardar "0 - raw" (a foto), "0 - clay", "0 - mask id" (fachadas / rua / céu) e "0 - render base".

**5. AI (Nano Banana: foto + render das sombras como referências)**
```
Photorealistic architectural photograph, same street, same buildings, same geometry and camera as the first reference image. Use the second reference only for the direction of sunlight and shadows. A quiet street in a small historic town in northern Portugal at late winter afternoon, low golden sun on one granite and plaster façade, the opposite side in cool blue shade, wet cobblestones with soft reflections, street lamps just turning on, clean and calm, competition-quality architectural visualization, fine film grain, no people, no cars, no text, no shop signs.
```
Regra: os edifícios têm de ficar reconhecíveis (mesmas janelas, mesmos telhados). Se a AI inventar prédios, baixa a força ou usa a máscara das fachadas.

**6. Entrega:** 2 finais + a foto original em "#042 - O meu bairro Penafiel / final". Eu faço o carrossel "antes → depois" e um reel slider (foto → imagem).

**Legenda**
- EN: "Daily Study #042 · My neighbourhood #1: Penafiel. A phone photo of my street, rebuilt in 3D and finished with AI. Same street, better light."
- PT: "Daily Study #042 · O meu bairro #1: Penafiel. Uma foto da minha rua tirada com o telemóvel, refeita em 3D e acabada com AI. A mesma rua, com outra luz."

---

## #043 · Brief de concurso: uma capela no campo (quinta, 11 fev)

**Ideia:** tratar o Daily Study como um concurso a sério (tipo CGArchitect / Render Awards): um programa curto, uma imagem forte. Uma capela pequena no meio de um campo de trigo, uma única fenda de luz no interior.

**1. Modelo 3D (20 min)**
- Volume único 6 × 12 m, 7 m de altura, cobertura de uma água, paredes em betão (ou taipa) sem janelas exceto uma fenda vertical de 15 cm atrás do altar e a porta.
- Interior: um banco comprido de madeira e um bloco de pedra como altar.
- Terreno: plano grande + caminho de terra até à porta.

**2. Câmaras (3), 4:5**
- A: exterior, 50 mm, longe, capela pequena no campo, muito céu.
- B: interior, 24 mm, do fundo para o altar, a fenda de luz a cortar o escuro.
- C: pormenor da luz a bater no altar de pedra, 85 mm.

**3. Luz:** exterior ao pôr do sol com névoa baixa; interior quase escuro, só a fenda (sol rasante a entrar por ela) e a porta entreaberta.

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (capela / campo / céu / interior) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A small minimalist chapel of board-marked concrete standing alone in a field of golden wheat at sunset, a dirt path leading to its single door, low mist over the field, vast soft sky; inside, near darkness with one thin vertical slit of warm sunlight falling on a rough stone altar and a long timber bench, visible light beam in the dusty air, silent contemplative atmosphere, award-winning architectural visualization, fine film grain, no people, no text, no religious symbols.
```
Regra: a fenda tem de estar no mesmo sítio nas 3 (atrás do altar); o interior fica MESMO escuro — não deixes a AI clarear.

**6. Entrega:** 3 finais em "#043 - Capela no campo / final". Eu escrevo o "programa" no último slide (3 linhas, como num concurso) e guardo a câmara A como candidata a concurso.

**Legenda**
- EN: "Daily Study #043 · A competition brief: a chapel in a field. One volume, one slit of light, nothing else. Treated like an entry, made in an afternoon."
- PT: "Daily Study #043 · Um brief de concurso: uma capela no campo. Um volume, uma fenda de luz, mais nada. Tratado como uma candidatura, feito numa tarde."

---

## #044 · Uma mesa para dois (sábado, 13 fev)

**Ideia:** véspera do Dia dos Namorados, imagem de época sem clichés (nada de corações). Uma mesa posta para dois junto a uma janela grande, à noite, velas, a cidade desfocada lá fora. Também serve de amostra para restaurantes e hotelaria.

**1. Modelo 3D (15 min)**
- Canto de restaurante 5 × 4 m: janela de chão a teto, mesa pequena redonda (Ø 70 cm), duas cadeiras simples, um banco corrido encostado à parede.
- Na mesa: 2 pratos, 2 copos, uma garrafa, 2 velas (cilindros). Toalha branca (plano com Cloth ou deixa para a AI).

**2. Câmaras (3), 4:5**
- A: geral, 35 mm, mesa + janela + cidade de noite.
- B: a altura da mesa, 50 mm, os dois copos e as velas em primeiro plano.
- C: macro da chama e do reflexo no copo, 100 mm.

**3. Luz:** só velas (1800 K, 2 pontos fortes na mesa) + um candeeiro baixo quente ao fundo (2400 K); lá fora, azul de noite com luzes da cidade.

**4. Render base:** 1600 px. Guardar "0 - clay", "0 - mask id" (mesa / vidro / sala / exterior) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same room, same geometry and camera as the reference image. An intimate table for two by a floor-to-ceiling window in a small restaurant at night, white linen tablecloth, two plates, two wine glasses, a dark glass bottle, two candles giving warm flickering light, a low warm lamp in the background, out-of-focus city lights and deep blue night sky outside, reflections of the candles in the window glass, elegant and quiet, fine dining hospitality photography, shallow depth of field, fine film grain, no people, no text, no hearts, no logos.
```
Regra: nada de corações, rosas ou texto; as chamas e os reflexos têm de estar nos mesmos sítios nas 3.

**6. Entrega:** 3 finais em "#044 - Mesa para dois / final". Para reel: câmara B, 5 s, chamas a tremer devagar (LTX 2.5, câmara parada).

**Legenda**
- EN: "Daily Study #044 · A table for two. Two candles, a big window, the city out of focus. For tomorrow, without the hearts."
- PT: "Daily Study #044 · Uma mesa para dois. Duas velas, uma janela grande, a cidade desfocada. Para amanhã, sem corações."

---

## #045 · Produto a flutuar: auscultadores sobre cor (terça, 16 fev)

**Ideia:** anúncio de produto "de campanha": um objeto a levitar sobre um fundo de cor sólida, sombra suave no chão. Rápido de fazer e muito forte no feed. Sem marca (o produto é inventado por ti).

**1. Modelo 3D (25 min)**
- Auscultadores over-ear simples: arco (Spline com espessura), 2 conchas (cilindros com Chamfer + Turbosmooth), almofadas (Torus achatado). Sem logótipos.
- Fundo infinito (curva) e chão da mesma cor.
- Produto a 40 cm do chão, inclinado ~15°.

**2. Câmaras (3), 4:5**
- A: hero, 85 mm, frontal-3/4, produto ao centro, muita cor à volta.
- B: de baixo, 50 mm, a ver o produto "por cima" do observador, sombra no chão visível.
- C: macro da almofada e da costura, 100 mm.

**3. Luz:** uma softbox grande por cima-lado (luz principal), um recorte por trás para separar do fundo, sombra suave no chão (é ela que "vende" o flutuar).

**4. Render base:** 2000 px (produto). Materiais: plástico mate, alumínio anodizado no arco, pele sintética nas almofadas. Fundo cor terracota-clara ou azul-acinzentado (escolhe um). Guardar "0 - clay", "0 - mask id" (produto / fundo / sombra) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic product advertising photograph, same object, same geometry and camera as the reference image. A pair of minimalist over-ear headphones floating in mid-air above a seamless solid-colour studio backdrop in muted dusty blue, matte plastic ear cups, anodized aluminium headband, soft synthetic leather cushions with fine stitching, one large soft key light from above, a subtle rim light separating the product from the background, a soft diffuse shadow on the floor below, clean premium campaign look, ultra sharp detail, no text, no logo, no brand name, no people.
```
Regra: o produto nunca pode mudar de forma (conchas, arco, almofadas iguais nas 3). Se mudar, aplica a AI só ao fundo e à sombra com o mask ID.

**6. Entrega:** 3 finais em "#045 - Auscultadores a flutuar / final". Para reel: câmara A, 5 s, o produto a rodar 20° e a subir/descer muito pouco (animação no 3ds Max, sem AI no produto).

**Legenda**
- EN: "Daily Study #045 · Product in the air: headphones over colour. A model of my own, one soft light, one soft shadow. Campaign look in an afternoon."
- PT: "Daily Study #045 · Produto no ar: auscultadores sobre cor. Um modelo meu, uma luz suave, uma sombra suave. Aspeto de campanha numa tarde."

---

## #046 · Cozinha com ilha ao amanhecer (quinta, 18 fev)

**Ideia:** a imagem que mais vende num empreendimento: a cozinha. Uma ilha em pedra, luz fria e limpa do primeiro sol a entrar de lado, tudo arrumado mas vivido (uma chávena, uma tábua com pão). Serve diretamente de amostra para promotores.

**1. Modelo 3D (25 min)**
- Cozinha em open space 6 × 4 m: parede de armários altos (frentes lisas, sem puxadores), ilha 2,6 × 1,0 m com tampo de 4 cm e uma ponta em cascata até ao chão, 3 bancos altos.
- Janela larga baixa (faixa horizontal) por cima da bancada lateral; porta de vidro para o jardim ao fundo.
- Adereços simples: chávena, tábua de madeira, taça com limões, um vaso com um ramo de oliveira.

**2. Câmaras (3), 4:5**
- A: geral, 28 mm, a 1,10 m de altura, ilha em diagonal, janela visível.
- B: ao nível do tampo, 50 mm, a ponta em cascata e a luz rasante na pedra.
- C: pormenor, 85 mm, chávena + limões com o sol a bater.

**3. Luz:** sol baixo da manhã (altura 8–10°, quase paralelo à janela), céu frio claro; nenhuma luz artificial ligada, ou só uma fita LED quente por baixo dos armários altos (fraca).

**4. Render base:** 1600 px. Materiais: tampo em pedra clara com veio suave, frentes em carvalho claro ou verde-sálvia mate, chão em microcimento. Guardar "0 - clay", "0 - mask id" (ilha / armários / chão / exterior) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural interior photograph, same room, same geometry and camera as the reference image. A contemporary open-plan kitchen at sunrise, a large kitchen island in honed pale natural stone with a waterfall edge to the floor, handleless light oak cabinetry, pale microcement floor, three slim bar stools, a wide horizontal window with low cool morning sun entering from the side and grazing the stone surface, long soft shadows, a ceramic cup, a wooden bread board and a bowl of lemons on the island, a small olive branch in a vase, a garden glimpsed through a glass door, fresh and calm, real estate editorial photography, fine film grain, no people, no text, no logos.
```
Regra: a direção do sol e as sombras dos bancos têm de bater certo nas 3; os limões e a chávena nos mesmos sítios.

**6. Entrega:** 3 finais em "#046 - Cozinha ao amanhecer / final". Para reel: câmara A, 6 s, travelling lateral lento ao longo da ilha (LTX 2.5).

**Legenda**
- EN: "Daily Study #046 · Kitchen at sunrise. The first light of the day, one stone island and nothing out of place. The image that sells the house."
- PT: "Daily Study #046 · Cozinha ao amanhecer. A primeira luz do dia, uma ilha em pedra e nada fora do sítio. A imagem que vende a casa."

---

## #047 · Casas de Portugal #6: Algarve (sábado, 20 fev)

**Ideia:** a série continua no sul. Casa contemporânea que reinterpreta a casa algarvia: volumes brancos cúbicos, açoteia (terraço no telhado), uma chaminé algarvia rendilhada reinventada em betão, buganvília, céu muito azul.

**1. Modelo 3D (30 min)**
- 3 volumes cúbicos brancos encaixados (3 m de altura cada, um com 2 pisos), açoteia com murete e escada exterior.
- Uma chaminé alta e esguia com padrão vazado (Boolean de pequenos rectângulos num prisma), o "ex-líbris" da imagem.
- Pátio com piso em tijoleira, uma alfarrobeira (proxy ou deixa para a AI), muro baixo caiado com portão de madeira.

**2. Câmaras (3), 4:5**
- A: exterior, 24 mm, do portão, volumes + chaminé contra o céu.
- B: na açoteia, 35 mm, olhar para o mar ao longe por cima do murete.
- C: pormenor, 85 mm, a chaminé vazada com o sol a passar pelos furos.

**3. Luz:** fim de tarde de verão (sol a 20°, quente), sombras nítidas e longas, céu azul profundo sem nuvens.

**4. Render base:** 1600 px. Cal branca ligeiramente irregular, caixilharia em verde-escuro, portão em madeira gasta. Guardar "0 - clay", "0 - mask id" (casa / chaminé / vegetação / céu) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A contemporary house in the Algarve, Portugal, reinterpreting traditional Algarvian architecture, interlocking white cubic volumes in slightly irregular lime render, a flat roof terrace (açoteia) with a low parapet and an external stair, a tall slender perforated concrete chimney inspired by Algarvian lace chimneys, dark green window frames, a weathered timber gate in a whitewashed garden wall, terracotta floor tiles, a carob tree and magenta bougainvillea, warm late-afternoon summer sun with long crisp shadows, deep blue cloudless sky, the sea far in the distance, fine film grain, no people, no text.
```
Regra: a chaminé é a protagonista — o padrão vazado não pode mudar entre câmaras; se mudar, mask ID e AI só à vegetação e ao céu.

**6. Entrega:** 3 finais em "#047 - Casas de Portugal 6 Algarve / final". Para reel: câmara C, 5 s, sol a passar pelos furos da chaminé e sombra a mover-se devagar.

**Legenda**
- EN: "Daily Study #047 · Houses of Portugal #6: Algarve. White cubes, a roof terrace and the old lace chimney, redrawn in concrete."
- PT: "Daily Study #047 · Casas de Portugal #6: Algarve. Cubos brancos, uma açoteia e a velha chaminé rendilhada, redesenhada em betão."

---

## #048 · Casa para um cliente imaginário #3: o músico (terça, 23 fev)

**Ideia:** a série dos clientes imaginários continua. Um contrabaixista de jazz quer uma sala de escuta em casa: madeira por todo o lado (acústica), um piano, discos, uma poltrona. Interior quente de noite.

**1. Modelo 3D (25 min)**
- Sala 6 × 5 m, pé-direito 3,5 m. Paredes e teto em ripado vertical de madeira (painéis acústicos com ritmos diferentes); uma parede com estante baixa cheia de discos (caixas finas repetidas com variação).
- Piano de cauda (modelo grátis do 3D Warehouse ou Sketchfab CC — confirma a licença e credita), contrabaixo encostado à parede (pode ser só silhueta para a AI), poltrona de leitura, tapete grosso.
- Uma janela alta estreita com a noite lá fora.

**2. Câmaras (3), 4:5**
- A: geral, 28 mm, piano + parede ripada + estante.
- B: a partir da poltrona, 50 mm, o contrabaixo e o gira-discos em primeiro plano.
- C: macro, 100 mm, agulha do gira-discos sobre o vinil.

**3. Luz:** noite; 2 candeeiros de pé quentes (2400 K) e uma luz de leitura sobre a poltrona; a madeira a "brilhar" quente; nada de luz de teto.

**4. Render base:** 1600 px. Madeira de nogueira escura no ripado, carvalho no chão, piano preto lacado. Guardar "0 - clay", "0 - mask id" (ripado / piano / estante / mobiliário) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same room, same geometry and camera as the reference image. A private music listening room for a jazz double bass player at night, walls and ceiling clad in vertical dark walnut acoustic slats with varying rhythm, a black lacquered grand piano, an upright double bass leaning against the wall, a low shelf full of vinyl records, a turntable, a worn leather reading armchair on a thick wool rug, two warm floor lamps and a reading light creating pools of golden light, a tall narrow window with deep blue night outside, intimate and warm, fine film grain, no people, no text, no logos, no readable album covers.
```
Regra: capas de discos sem texto legível nem arte de terceiros (se a AI inventar, desfoca ou repinta).

**6. Entrega:** 3 finais em "#048 - Cliente imaginário 3 músico / final". Para reel: câmara C, 5 s, o vinil a rodar devagar (animação simples no 3ds Max ou LTX 2.5), com som de vinil.

**Legenda**
- EN: "Daily Study #048 · A house for an imaginary client #3: the musician. A room made of wood so the double bass sounds right. Built for listening."
- PT: "Daily Study #048 · Casa para um cliente imaginário #3: o músico. Uma sala feita de madeira para o contrabaixo soar bem. Feita para ouvir."

---

## #049 · Quarto de hotel, domingo de manhã (quinta, 25 fev)

**Ideia:** hotelaria é um cliente direto para archviz. Um quarto de hotel boutique logo de manhã: cortinas de linho a filtrar a luz, cama desfeita com elegância, um tabuleiro de pequeno-almoço. Calmo e caro.

**1. Modelo 3D (20 min)**
- Quarto 5 × 4,5 m: cama king com cabeceira estofada alta (caixa com Chamfer), 2 mesas de cabeceira, poltrona, banco aos pés da cama.
- Janela de chão a teto com cortinas de linho (planos com Cloth ou só ondulação com Noise), varanda insinuada lá fora.
- Lençóis: deixa a cama "feita" no 3D; a AI desfaz com elegância. Tabuleiro com café e croissant em cima da cama.

**2. Câmaras (3), 4:5**
- A: geral, 24 mm, do canto da porta, cama + janela.
- B: lateral à cama, 50 mm, o tabuleiro e a luz no lençol.
- C: pormenor, 85 mm, cortina com o sol a atravessar o tecido.

**3. Luz:** sol da manhã difuso pelas cortinas (luz quente suave, sem sombras duras), um candeeiro de cabeceira ainda aceso (fraco).

**4. Render base:** 1600 px. Paleta: bege, branco-quente, castanho de nogueira, um toque de verde-azeitona. Guardar "0 - clay", "0 - mask id" (cama / cortinas / mobiliário / exterior) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same room, same geometry and camera as the reference image. A boutique hotel bedroom on a Sunday morning, a king bed with a tall upholstered headboard and softly rumpled white linen sheets, a breakfast tray with coffee, a croissant and orange juice on the bed, walnut bedside tables, a bouclé armchair, sheer natural linen curtains glowing with warm diffused morning sunlight, one bedside lamp still softly on, a balcony glimpsed behind the curtains, beige, warm white and olive palette, calm luxury hospitality photography, fine film grain, no people, no text, no logos.
```
Regra: os lençóis podem variar ligeiramente, mas a cama, a cabeceira e o tabuleiro ficam no mesmo sítio nas 3.

**6. Entrega:** 3 finais em "#049 - Quarto de hotel / final". Para reel: câmara C, 5 s, cortina a mexer com uma brisa leve (LTX 2.5, câmara parada).

**Legenda**
- EN: "Daily Study #049 · Hotel room, Sunday morning. Linen curtains, soft light, coffee in bed. Nobody wants to check out."
- PT: "Daily Study #049 · Quarto de hotel, domingo de manhã. Cortinas de linho, luz suave, café na cama. Ninguém quer fazer check-out."

---

## #050 · Abecedário arquitetónico #2: B de Brise-soleil (sábado, 27 fev)

**Ideia:** a série do abecedário continua. Uma fachada com lâminas verticais (brise-soleil) e a sombra riscada que elas desenham no interior. Exterior e interior do mesmo edifício.

**1. Modelo 3D (20 min)**
- Edifício de 3 pisos, fachada com lâminas verticais de 10 × 40 cm a cada 30 cm, ligeiramente rodadas (rodar 15–25° com variação suave de baixo para cima).
- Atrás das lâminas: varanda corrida e vidro. Um interior simples no 2.º piso (chão, uma mesa, uma cadeira) para a câmara C.

**2. Câmaras (3), 4:5**
- A: exterior, 35 mm, de baixo em diagonal, o ritmo das lâminas.
- B: exterior frontal, 85 mm, compressão: só lâminas a encher a imagem, abstrato.
- C: interior, 28 mm, as riscas de sombra no chão e na mesa.

**3. Luz:** sol de inverno a meio da tarde (25°, lateral), céu limpo; no interior, só a luz do sol filtrada.

**4. Render base:** 1600 px. Lâminas em betão claro ou madeira de lariço (escolhe uma), caixilharia escura, chão interior em betão polido. Guardar "0 - clay", "0 - mask id" (lâminas / vidro / céu / interior) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A three-storey contemporary building with a facade of slender vertical pale concrete brise-soleil fins, gradually rotating from bottom to top, a continuous balcony and dark-framed glazing behind the fins, low winter afternoon sunlight from the side creating a strong rhythm of light and shadow, inside a striped pattern of sun and shadow falling across a polished concrete floor and a simple oak table, clear pale blue sky, precise and calm, architectural magazine photography, fine film grain, no people, no text.
```
Regra: número e rotação das lâminas iguais nas 3; as riscas no interior têm de vir da mesma direção do sol do exterior.

**6. Entrega:** 3 finais em "#050 - Abecedario B Brise-soleil / final". Para reel: câmara C, 6 s, timelapse das riscas de sombra a atravessarem a mesa (anima o sol no 3ds Max, render baixo + AI frame a frame só se ficar coerente; senão, LTX 2.5).

**Legenda**
- EN: "Daily Study #050 · Architectural alphabet #2: B for Brise-soleil. Vertical fins, a winter sun, and a room full of stripes."
- PT: "Daily Study #050 · Abecedário arquitetónico #2: B de Brise-soleil. Lâminas verticais, um sol de inverno e uma sala cheia de riscas."

---

## #051 · Chuva à noite: entrada de prédio (terça, 2 mar)

**Ideia:** variação de ambiente (pilar "mood"): a entrada de um prédio de habitação numa noite de chuva — passeio molhado, reflexos, o átrio quente iluminado. Mostra que a mesma arquitetura pode ser vendida com emoção, não só com sol.

**1. Modelo 3D (20 min)**
- Base de prédio: piso térreo recuado com átrio envidraçado (pé-direito 4 m), pala em betão sobre a entrada, porta de vidro pivotante.
- Passeio em calçada/pedra e lancil, uma árvore de rua, um poste de luz, um banco no átrio e uma parede de madeira lá dentro.
- Podes reaproveitar um dos teus projetos (ex.: Gondomar 2) — fica também como "variação de ambiente" do projeto real, se o cliente autorizar.

**2. Câmaras (3), 4:5**
- A: rua, 28 mm, do outro lado do passeio, entrada inteira + reflexos no chão.
- B: baixa, 35 mm, a 30 cm do chão, poça em primeiro plano a refletir o átrio.
- C: pormenor, 85 mm, gotas a cair da pala com o átrio desfocado atrás.

**3. Luz:** noite azul; átrio muito quente (2700 K) a ser a fonte principal; poste de rua mais frio (4000 K); chão molhado = reflexos fortes.

**4. Render base:** 1600 px. Chão com material refletivo molhado (glossiness alta + mapa de poças). Guardar "0 - clay", "0 - mask id" (edifício / chão / átrio / céu) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural night photograph, same building, same geometry and camera as the reference image. The ground-floor entrance of a contemporary residential building on a rainy night, a recessed fully glazed double-height lobby glowing with warm 2700K light, a timber-clad wall and a simple bench inside, a thick concrete canopy over the entrance with raindrops falling from its edge, wet stone pavement with puddles and strong reflections of the warm lobby and a cool street lamp, a street tree, light rain visible in the lamp light, deep blue night, moody and cinematic, fine film grain, no people, no text, no logos.
```
Regra: os reflexos têm de corresponder às fontes de luz reais (átrio e poste); a chuva vê-se só onde há luz.

**6. Entrega:** 3 finais em "#051 - Chuva à noite / final". Para reel: câmara B, 6 s, chuva a cair nas poças com reflexos a tremer (Seedance ou LTX 2.5), com som de chuva.

**Legenda**
- EN: "Daily Study #051 · Rain at night. Same architecture, different feeling: wet stone, warm glass, and a reason to come home."
- PT: "Daily Study #051 · Chuva à noite. A mesma arquitetura, outra emoção: pedra molhada, vidro quente e uma razão para chegar a casa."

---

## #052 · Escritório em casa com luz de norte (quinta, 4 mar)

**Ideia:** o canto de trabalho que toda a gente quer depois de 2020: uma secretária comprida em frente a uma janela grande virada a norte, luz suave e igual o dia todo, estante de livros, uma planta. Interior calmo, de revista, e muito útil para promotores ("a casa onde se trabalha bem").

**1. Modelo 3D (20 min)**
- Divisão 4 × 3,5 m, pé-direito 2,8 m; janela de canto ou uma janela larga 2,4 × 1,6 m com peitoril baixo e banco embutido.
- Secretária em madeira maciça 2,2 m encostada à janela, cadeira de escritório simples (modelo grátis 3D Warehouse/Sketchfab CC — confirma a licença), candeeiro de braço articulado.
- Estante do chão ao teto numa parede (caixas simples; os livros podem ficar para a AI), tapete de lã, uma figueira-lira num vaso.

**2. Câmaras (3), 4:5**
- A: geral, 28 mm, da porta, secretária + janela + estante.
- B: ao nível dos olhos sentado, 40 mm, por trás da cadeira, o portátil fechado e a vista lá fora.
- C: pormenor, 85 mm, caderno aberto, caneta e chávena com a luz suave a desenhar o volume.

**3. Luz:** céu encoberto claro (luz de norte: sem sol direto), exposição para o interior, janela ligeiramente sobreexposta mas com a vista legível; candeeiro desligado (ou aceso, quente e fraco, para uma 2.ª versão "fim de tarde").

**4. Render base:** 1600 px. Madeira de carvalho natural, paredes em branco-quente, chão em soalho largo. Guardar "0 - clay", "0 - mask id" (móveis / estante / janela-exterior / planta) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural interior photograph, same room, same geometry and camera as the reference image. A calm contemporary home office, a long solid oak desk placed in front of a large window with soft even north light, a built-in window seat, a simple task chair, an articulated desk lamp, a floor-to-ceiling bookshelf filled with books and a few ceramics, a wool rug, a fiddle-leaf fig in a terracotta pot, an open notebook, a pen and a ceramic cup on the desk, a green garden and trees visible outside, warm white walls and wide oak floorboards, soft diffuse daylight, no direct sun, editorial interior photography, fine film grain, no people, no screens showing content, no text, no logos.
```
Regra: os livros e objetos da estante podem variar, mas a secretária, a janela e a planta ficam iguais nas 3 câmaras; nada de ecrãs com conteúdo.

**6. Entrega:** 3 finais em "#052 - Escritório em casa / final". Para reel: câmara B, 6 s, push-in muito lento em direção à janela, folhas a mexer lá fora (LTX 2.5).

**Legenda**
- EN: "Daily Study #052 · Home office, north light. Soft light all day, one long desk and a view to rest the eyes."
- PT: "Daily Study #052 · Escritório em casa, luz de norte. Luz suave o dia todo, uma secretária comprida e uma vista para descansar os olhos."

---

## #053 · Casas de Portugal #7: Minho (sábado, 6 mar)

**Ideia:** a série chega ao norte, perto de casa. Casa contemporânea em granito e madeira escura no meio do verde do Minho, com um volume que reinterpreta o espigueiro (caixa elevada sobre pilares, com ripado). Chuva miúda acabada de passar, tudo húmido e muito verde.

**1. Modelo 3D (30 min)**
- Volume principal térreo em granito aparelhado (blocos grandes, juntas finas), cobertura de duas águas baixa em zinco escuro.
- Volume "espigueiro": caixa de madeira ripada 6 × 2,5 m elevada 1,5 m sobre 4 pilares de granito com "mesas" (o capitel em disco típico) — é o quarto/escritório.
- Socalco com muro de pedra seca, uma vinha em ramada ao lado (pérgola simples), milheiral ou relvado alto à frente (deixa para a AI).

**2. Câmaras (3), 4:5**
- A: exterior, 24 mm, do socalco de baixo, os dois volumes e a ramada.
- B: 35 mm, debaixo do espigueiro, entre os pilares, a olhar para o vale.
- C: pormenor, 85 mm, o pilar com a "mesa" de granito e gotas de água na madeira ripada.

**3. Luz:** depois da chuva: céu encoberto com uma abertura de sol fraca ao fundo, granito escurecido pela água, névoa leve no vale.

**4. Render base:** 1600 px. Granito cinzento com variação, madeira ripada castanho-escura, caixilharia preta fina. Guardar "0 - clay", "0 - mask id" (casa / espigueiro / vegetação / céu-vale) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A contemporary house in the Minho region of northern Portugal, a low main volume in large ashlar granite blocks with a dark zinc pitched roof, and a raised timber-slatted volume reinterpreting a traditional espigueiro granary, lifted on four granite pillars with round granite caps, a dry-stone terrace wall, a pergola vineyard (ramada) beside the house, lush green fields and wooded hills, just after rain: wet darkened granite, water droplets on the timber slats, soft overcast light with a faint break of sun in the distance, light mist in the valley, quiet and fresh, fine film grain, no people, no text.
```
Regra: os pilares com o disco de granito são a assinatura — mesmos 4 pilares, mesma altura nas 3 câmaras; AI só no verde, céu e humidade se a casa começar a mudar.

**6. Entrega:** 3 finais em "#053 - Casas de Portugal 7 Minho / final". Para reel: câmara B, 6 s, névoa a mover-se devagar no vale e gotas a cair da madeira (Seedance), com som de pássaros e água.

**Legenda**
- EN: "Daily Study #053 · Houses of Portugal #7: Minho. Granite, green and an old granary lifted into a bedroom, right after the rain."
- PT: "Daily Study #053 · Casas de Portugal #7: Minho. Granito, verde e um espigueiro transformado em quarto, logo depois da chuva."

---

## #054 · Produto em contraluz: uma garrafa de azeite (terça, 9 mar)

**Ideia:** produto português, inventado por ti (sem marca real): uma garrafa de vidro de azeite com a luz por trás a acender o dourado-verde. Treina vidro + líquido + cáusticas — o tipo de imagem que marcas de gourmet pagam.

**1. Modelo 3D (20 min)**
- Garrafa de vidro alta e quadrada (6 × 6 × 28 cm), ombros arredondados, rolha de cortiça com selo de cera; rótulo em papel simples só com uma linha fina e um nome inventado (ex.: "Oliva · Trás-os-Montes") — ou rótulo em branco e a AI só respeita.
- Base em pedra de xisto escura, um ramo de oliveira com 3 azeitonas, uma pequena taça de cerâmica com azeite.
- Fundo infinito em cor de areia quente.

**2. Câmaras (3), 4:5**
- A: hero, 85 mm, garrafa centrada e ligeiramente de baixo, luz a atravessar o azeite.
- B: 100 mm macro, a taça com a superfície do azeite a refletir a garrafa.
- C: top-down, 50 mm, xisto + ramo + taça + sombra da garrafa (composição gráfica).

**3. Luz:** contraluz forte (softbox atrás e um pouco acima), recorte lateral fino para desenhar as arestas do vidro, cáusticas douradas no xisto; frente com rebatimento fraco.

**4. Render base:** 1600 px. Vidro com IOR 1,52 e espessura real; líquido com IOR 1,47 e absorção verde-dourada; ativar cáusticas (ou deixá-las para a AI). Guardar "0 - clay", "0 - mask id" (garrafa / líquido / rótulo / base / fundo) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic premium product photograph, same objects, same geometry and camera as the reference image. A tall square glass bottle of Portuguese extra virgin olive oil with rounded shoulders, a natural cork stopper sealed with dark green wax, a minimal paper label kept exactly as in the reference, strong backlight shining through the golden-green oil, thin rim lights tracing the glass edges, golden caustics falling on a dark slate stone base, an olive branch with three olives, a small ceramic dish of olive oil with a glossy surface, seamless warm sand-coloured background, luxury gourmet advertising, crisp detail, fine film grain, no extra text, no real brand logos.
```
Regra: o rótulo NÃO pode ser inventado pela AI (texto estranho) — usa mask ID e protege o rótulo, ou deixa-o em branco; o nível do azeite igual nas 3.

**6. Entrega:** 3 finais em "#054 - Azeite em contraluz / final". Para reel: câmara B, 5 s, uma gota a cair na taça e ondas na superfície (Seedance), som de gota.

**Legenda**
- EN: "Daily Study #054 · Backlit olive oil. Light through glass and gold: an invented Portuguese brand, a real product shot."
- PT: "Daily Study #054 · Azeite em contraluz. A luz a atravessar vidro e ouro: uma marca portuguesa inventada, uma fotografia de produto a sério."

---

## #055 · Abecedário arquitetónico #3: C de Claustro (quinta, 11 mar)

**Ideia:** a série continua com o C. Um claustro contemporâneo: pátio quadrado rodeado por uma galeria de pilares finos em betão, uma oliveira ao centro, as sombras dos pilares a riscar o chão. Silêncio, ritmo, luz.

**1. Modelo 3D (25 min)**
- Pátio 12 × 12 m, galeria a toda a volta com 2,5 m de largura, pilares quadrados 25 × 25 cm a cada 2,4 m, laje fina por cima (30 cm).
- Paredes interiores da galeria em reboco branco-quente, com 2–3 portas altas de madeira.
- Centro: uma oliveira velha (proxy ou deixa para a AI) num quadrado de terra com gravilha, um banco de pedra.

**2. Câmaras (3), 4:5**
- A: geral, 24 mm, do canto da galeria, a perspetiva dos pilares a fugir + o pátio.
- B: frontal, 35 mm, simétrica, do lado oposto, a oliveira enquadrada entre dois pilares.
- C: pormenor, 70 mm, o chão da galeria com as sombras dos pilares em riscas e uma porta de madeira.

**3. Luz:** sol de fim de manhã a 40°, entrando de lado na galeria para fazer as riscas de sombra; céu limpo azul-claro.

**4. Render base:** 1600 px. Betão claro liso nos pilares, chão em pedra calcária em lajes grandes, gravilha clara. Guardar "0 - clay", "0 - mask id" (pilares-laje / paredes / chão / oliveira / céu) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A contemporary cloister, a square courtyard surrounded by a colonnade of slender square pale concrete columns supporting a thin flat slab, warm white lime-rendered walls with tall timber doors, large pale limestone floor slabs, an ancient olive tree in a square bed of light gravel at the centre with a simple stone bench, late-morning sun entering the gallery from the side and casting a rhythm of crisp striped column shadows across the floor, clear pale blue sky, serene and monastic, fine film grain, no people, no text.
```
Regra: o número e o espaçamento dos pilares são sagrados — conta-os em cada câmara; se a AI acrescentar ou tirar pilares, protege-os com o mask ID.

**6. Entrega:** 3 finais em "#055 - Abecedario C Claustro / final". Para reel: câmara C, 6 s, sombras dos pilares a deslizar devagar no chão (timelapse curto, LTX 2.5).

**Legenda**
- EN: "Daily Study #055 · Architectural alphabet #3: C for Cloister. Columns, shadow, one old olive tree. Rhythm is a material too."
- PT: "Daily Study #055 · Abecedário arquitetónico #3: C de Claustro. Pilares, sombra e uma oliveira velha. O ritmo também é um material."

---

## #056 · Desafio de cor #3: azul-azulejo (sábado, 13 mar)

**Ideia:** a série das cores continua com o azul do azulejo português. Uma casa de banho (ou cozinha) onde uma parede inteira é em azulejo azul-cobalto contemporâneo (liso, brilhante, junta fina), tudo o resto branco e madeira. O carrossel termina com uma paleta de 5 cores tirada da imagem (pilar "paleta").

**1. Modelo 3D (20 min)**
- Casa de banho 3 × 2,5 m: parede do fundo toda em azulejo quadrado 10 × 10 cm (junta 2 mm), lavatório suspenso em madeira com bacia de pousar branca, espelho redondo, base de duche ao nível do chão com resguardo de vidro.
- Janela alta estreita de lado; um banco de madeira com uma toalha de linho, um ramo de eucalipto.

**2. Câmaras (3), 4:5**
- A: geral, 28 mm, da porta, a parede azul inteira em frente.
- B: 50 mm, lavatório + espelho com o reflexo da janela.
- C: macro, 100 mm, a superfície do azulejo com o brilho e uma gota de água a escorrer.

**3. Luz:** luz natural de manhã pela janela lateral, rasante no azulejo para mostrar as pequenas irregularidades do vidrado; sem luz artificial.

**4. Render base:** 1600 px. Azulejo com bump/normal ligeiro (cada peça um pouco diferente) e reflexo alto; madeira de carvalho; chão em microcimento branco. Guardar "0 - clay", "0 - mask id" (azulejo / madeira / louças / vidro) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural interior photograph, same room, same geometry and camera as the reference image. A contemporary bathroom where the entire back wall is clad in glossy handmade cobalt-blue Portuguese square tiles with very thin joints and subtle variations in the glaze, a floating light oak vanity with a white vessel basin, a round mirror, a level walk-in shower with a clear glass screen, white microcement floor, a tall narrow side window with soft morning light grazing the tiles and revealing their texture, a linen towel on a small oak bench, a eucalyptus branch, calm and fresh, editorial interior photography, fine film grain, no people, no text, no logos.
```
Regra: o azul tem de ser o MESMO nas 3 (verifica com conta-gotas: aproximadamente #1f4fa0); se a AI o desviar, corrige em edição antes de tirar a paleta.

**6. Entrega:** 3 finais em "#056 - Desafio de cor 3 azul / final" + 1 slide de paleta (eu faço-o a partir das tuas finais). Para reel: câmara C, 5 s, gota a escorrer no azulejo (Seedance).

**Legenda**
- EN: "Daily Study #056 · Colour challenge #3: azulejo blue. One wall, one colour, centuries of Portuguese tiles. Next colour? Tell me below."
- PT: "Daily Study #056 · Desafio de cor #3: azul-azulejo. Uma parede, uma cor, séculos de azulejo português. Próxima cor? Diz-me aqui em baixo."

---

## #057 · Brief de concurso #2: abrigo num miradouro da costa (terça, 16 mar)

**Ideia:** segundo "concurso imaginário". Um pequeno abrigo/miradouro numa falésia da costa vicentina: uma laje de betão em consola sobre o mar, um banco corrido e uma parede que corta o vento. Imagem de concurso: dramática, simples, com escala humana sugerida (sem pessoas — só uma mochila e um casaco no banco).

**1. Modelo 3D (25 min)**
- Laje de betão 8 × 3 m, 40 cm de espessura, 3 m em consola sobre a falésia; parede curva de betão 2,2 m de altura a abrigar do vento; banco corrido moldado na parede.
- Falésia em xisto (displacement simples ou deixa para a AI), mar lá em baixo, vegetação rasteira (urze, esteva).
- Um caminho de terra a chegar ao abrigo, uma mochila e um casaco no banco (escala).

**2. Câmaras (3), 4:5**
- A: aproximação, 24 mm, do caminho, o abrigo contra o horizonte.
- B: de baixo, 35 mm, de uma rocha lateral, a consola a voar sobre o mar (a imagem do concurso).
- C: pormenor, 70 mm, o banco com a mochila e o mar desfocado atrás.

**3. Luz:** fim de tarde, sol a 10° quase de frente (contraluz quente), mar a brilhar, nuvens altas finas; segunda versão opcional: nevoeiro atlântico.

**4. Render base:** 1600 px. Betão cofrado a tábua (marcas horizontais), xisto escuro, vegetação baixa verde-acinzentada. Guardar "0 - clay", "0 - mask id" (betão / falésia / vegetação / mar-céu) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural competition image, same structure, same geometry and camera as the reference image. A small coastal viewpoint shelter on a cliff of the Costa Vicentina, Portugal, a thick board-marked concrete slab cantilevering dramatically over the Atlantic Ocean, a curved concrete windbreak wall with a built-in continuous bench, dark schist cliffs, low wind-shaped heather and rockrose, a dirt path leading to the shelter, a backpack and a jacket resting on the bench for scale, late-afternoon low sun almost facing the camera, warm backlight, glittering sea far below, thin high clouds, powerful and quiet, fine film grain, no people, no text.
```
Regra: a consola tem de manter a espessura e o comprimento — é ela que faz a imagem; o mar e a falésia podem variar entre câmaras, o betão não.

**6. Entrega:** 3 finais em "#057 - Concurso 2 Miradouro costa / final". Para reel: câmara B, 6 s, ondas a bater na falésia lá em baixo e nuvens a correr (Seedance), som de vento e mar.

**Legenda**
- EN: "Daily Study #057 · Imaginary competition #2: a cliff-top shelter. One concrete slab, the Atlantic, and a place to stop the wind."
- PT: "Daily Study #057 · Concurso imaginário #2: um abrigo na falésia. Uma laje de betão, o Atlântico e um sítio para parar o vento."

---

## #058 · Casa para um cliente imaginário #4: o padeiro (quinta, 18 mar)

**Ideia:** quarto cliente imaginário. Um padeiro artesanal quer morar por cima da sua padaria numa vila do Douro: forno a lenha no piso 0, casa no piso 1. Imagem principal: a padaria ao nascer do dia, com a montra iluminada e a casa às escuras por cima.

**1. Modelo 3D (25 min)**
- Volume de 2 pisos 6 × 9 m, fachada em reboco claro, montra larga em madeira ao nível da rua com balcão, cobertura de telha de duas águas.
- Porta lateral da casa, janela alta no piso 1, uma chaminé de tijolo a fumegar (aqui a AI ajuda).
- Rua em calçada, um banco, sacos de farinha à porta, um carrinho de madeira (escala e história).

**2. Câmaras (3), 4:5**
- A: rua, 28 mm, a fachada inteira na hora azul antes do sol, montra acesa.
- B: 50 mm, a montra e o balcão com pães, vistos da rua.
- C: 85 mm, pormenor da porta lateral com os sacos de farinha e a calçada molhada.

**3. Luz:** antes do nascer do sol (hora azul), montra com luz quente de 2700 K, a casa no piso 1 às escuras; luz da rua fraca. Versão opcional: já de dia, sol rasante.

**4. Render base:** Render 1600 px; reboco claro rugoso, madeira escura na montra, telha antiga, calçada de granito. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A small two-storey artisan bakery with a family home above, in a village of the Douro valley, Portugal, pale lime-plaster facade, a wide dark timber shopfront glowing with warm light and loaves of bread on a wooden counter, a smoking brick chimney, old terracotta roof, granite cobblestone street slightly wet, flour sacks by the side door, blue hour just before sunrise, quiet and intimate, fine film grain, no people, no text, no logos.
```
Regra: o letreiro fica SEM texto (não inventes nome); a montra é a fonte de luz e tem de ser igual nas 3 câmaras.

**6. Entrega:** 3 finais em "#058 - Cliente imaginário 4 padeiro / final". Para reel: câmara A, 5 s, fumo da chaminé e luz da montra a tremer ligeiramente (Seedance).

**Legenda**
- EN: "Daily Study #058 · Imaginary client #4: the baker. A bakery downstairs, a home upstairs, and a light that is always on before the town wakes up."
- PT: "Daily Study #058 · Cliente imaginário #4: o padeiro. Uma padaria em baixo, a casa em cima e uma luz que está sempre acesa antes de a vila acordar."

---

## #059 · Casas de Portugal #8: aldeia de xisto da Beira (sábado, 20 mar)

**Ideia:** oitava casa da série: uma casa recuperada numa aldeia de xisto da Serra da Lousã/Beira, paredes de xisto, janelas pequenas, telhado de lousa, vista para o vale com nevoeiro de manhã.

**1. Modelo 3D (20 min)**
- Casa 5 × 8 m, 2 pisos, paredes de xisto em aparelho irregular (textura de pedra por bump), cobertura de lousa cinzenta, 2 janelas pequenas com caixilho de madeira, varanda de madeira estreita.
- Muro de xisto, escada de pedra, um castanheiro e lenha empilhada à porta.
- Ao fundo, o vale (planos de silhueta, sem detalhe).

**2. Câmaras (3), 4:5**
- A: 28 mm, do caminho, a casa com o vale atrás.
- B: 50 mm, a janela e a lenha empilhada.
- C: 85 mm, a varanda de madeira com uma manta e uma caneca fumegante.

**3. Luz:** manhã de outono com nevoeiro no vale, luz difusa e fria vinda de trás da casa; uma só janela com luz quente por dentro.

**4. Render base:** Render 1600 px; xisto cinza-azulado com variações, lousa fosca, madeira escurecida, folhas de castanheiro no chão. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same house, same geometry and camera as the reference image. A restored traditional house in a schist village in the mountains of central Portugal, rough grey-blue schist walls, slate roof, small timber-framed windows, a narrow wooden balcony with a blanket and a steaming mug, stacked firewood by the door, a chestnut tree with autumn leaves, a valley full of morning mist behind, soft cold diffused light with one warm lit window, quiet and timeless, fine film grain, no people, no text.
```
Regra: a pedra e a lousa não mudam de cor entre câmaras; só o nevoeiro pode variar.

**6. Entrega:** 3 finais em "#059 - Casas de Portugal 8 Beira / final". Para reel: câmara A, 6 s, o nevoeiro a mover-se no vale (Seedance).

**Legenda**
- EN: "Daily Study #059 · Houses of Portugal #8: a schist village in the Beira mountains. Stone that has held for centuries, mist that comes every morning."
- PT: "Daily Study #059 · Casas de Portugal #8: uma aldeia de xisto na Beira. Pedra que aguenta há séculos, nevoeiro que chega todas as manhãs."

---

## #060 · Natureza-morta à Morandi (terça, 23 mar)

**Ideia:** um exercício de produto/ambiente com quase nada: 5 objetos cerâmicos simples (garrafas, copo, taça) em tons terrosos sobre uma mesa, luz de janela lateral, à maneira das pinturas de Morandi. Imagem calma, muito vendável como arte.

**1. Modelo 3D (15 min)**
- Mesa de madeira clara 1,2 × 0,6 m, parede lisa cor areia atrás.
- 5 objetos em torno: 2 garrafas altas, 1 jarro baixo, 1 taça, 1 copo (formas por revolução, 2 min cada); cores terra, creme, verde-sálvia.
- Objetos muito próximos uns dos outros, alturas escalonadas.

**2. Câmaras (3), 4:5**
- A: 85 mm, frontal, o grupo todo.
- B: 100 mm, ligeiramente de cima, dois objetos e as sombras.
- C: macro 135 mm, o rebordo de uma garrafa com a luz.

**3. Luz:** luz de janela lateral à esquerda, suave, com a sombra de cada objeto a tocar no vizinho; sem luz de preenchimento.

**4. Render base:** Render 1600 px; cerâmica mate com ligeira variação de esmalte, madeira de carvalho, parede em estuque areia. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic still life photograph, same objects, same arrangement and camera as the reference image. A quiet Morandi-style arrangement of five matte ceramic vessels in muted earth, cream and sage tones on a pale oak table against a sand-coloured plaster wall, soft side light from a window on the left with long gentle overlapping shadows, subtle glaze variations, calm and meditative, fine film grain, no people, no text, no logos.
```
Regra: o arranjo (posição e proporção dos objetos) é igual nas 3 câmaras; só muda o enquadramento.

**6. Entrega:** 3 finais em "#060 - Natureza-morta Morandi / final". Para reel: câmara A, 5 s, a sombra a deslizar lentamente pela parede (Seedance).

**Legenda**
- EN: "Daily Study #060 · Still life, Morandi style: five vessels, one window, no noise. Sometimes the whole image is just light."
- PT: "Daily Study #060 · Natureza-morta à Morandi: cinco peças, uma janela, zero ruído. Às vezes a imagem toda é só luz."

---

## #061 · Abecedário arquitetónico #4: D de Degrau (quinta, 25 mar)

**Ideia:** quarto da série A–Z. Uma escadaria exterior larga em pedra que também é bancada e praça: degraus onde se sobe, se senta e se encontra alguém. Imagem de cidade, simples e gráfica.

**1. Modelo 3D (20 min)**
- Escadaria em granito de 12 m de largura com 14 degraus de 16 cm de altura, patamar a meio com um banco corrido de pedra.
- Muros laterais baixos, um candeeiro alto, uma árvore em vaso no patamar.
- Fundo: fachadas simplificadas (volumes) em tons claros.

**2. Câmaras (3), 4:5**
- A: 24 mm, de baixo, a escadaria inteira em perspetiva.
- B: 50 mm, de lado, o ritmo dos degraus em diagonal.
- C: 85 mm, o banco do patamar com a árvore e a sombra.

**3. Luz:** fim de tarde, sol rasante de lado que marca cada degrau com uma linha de sombra; céu limpo.

**4. Render base:** Render 1600 px; granito de grão fino com juntas visíveis, ligeiro desgaste nos rebordos. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same staircase, same geometry and camera as the reference image. A wide outdoor granite staircase with a mid-landing and a long stone bench in a calm European city square, each step edged by a crisp line of low late-afternoon sun and shadow, a single tall lamp post, a potted tree on the landing, pale simplified facades behind, clear sky, graphic and serene, fine film grain, no people, no text.
```
Regra: o número de degraus e a altura são iguais nas 3 câmaras (a AI tende a inventar degraus a mais: conta-os).

**6. Entrega:** 3 finais em "#061 - Abecedario 4 D Degrau / final". Para reel: câmara B, 5 s, sombra a subir pelos degraus (Seedance).

**Legenda**
- EN: "Daily Study #061 · Architectural alphabet #4: D for Steps. The simplest way to build a public square."
- PT: "Daily Study #061 · Abecedário arquitetónico #4: D de Degrau. A forma mais simples de construir uma praça."

---

## #062 · Desafio de cor #4: amarelo-açafrão (sábado, 27 mar)

**Ideia:** a série das cores continua: um escritório/canto de leitura em que uma só cor domina, amarelo-açafrão (quente, não limão), com madeira e branco. O carrossel termina com a paleta de 5 cores tirada da imagem.

**1. Modelo 3D (20 min)**
- Canto de leitura 3 × 3 m: poltrona baixa estofada em amarelo-açafrão, um tapete redondo creme, estante de carvalho embutida, candeeiro de chão em latão.
- Parede do fundo pintada em branco quente; uma pequena mesa lateral com uma chávena.
- Janela com cortina de linho.

**2. Câmaras (3), 4:5**
- A: 28 mm, geral, a poltrona no centro do enquadramento.
- B: 50 mm, poltrona + estante em ângulo.
- C: macro 100 mm, a textura do tecido amarelo com a luz.

**3. Luz:** luz da tarde pela janela, quente, suave; sem luz artificial de dia.

**4. Render base:** Render 1600 px; tecido com bump de trama, carvalho claro, latão com reflexo leve. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same room, same furniture and camera as the reference image. A calm reading corner with a low armchair upholstered in saffron-yellow woven fabric, a round cream rug, built-in light oak shelves with a few books, a brass floor lamp, warm white walls, linen curtains, soft warm afternoon window light, saffron yellow as the single dominant colour, editorial interior photography, fine film grain, no people, no text.
```
Regra: o amarelo tem de ser o MESMO nas 3 (conta-gotas: aproximadamente #e0a21b); corrige em edição antes de tirar a paleta.

**6. Entrega:** 3 finais em "#062 - Desafio de cor 4 acafrao / final" + 1 slide de paleta (eu faço-o a partir das tuas finais, scripts/make_palette.py). Para reel: câmara C, 5 s, poeira a flutuar na luz (Seedance).

**Legenda**
- EN: "Daily Study #062 · Colour challenge #4: saffron yellow. One chair, one colour, one warm afternoon. Next colour? Tell me below."
- PT: "Daily Study #062 · Desafio de cor #4: amarelo-açafrão. Uma poltrona, uma cor, uma tarde quente. Próxima cor? Diz-me aqui em baixo."

---

## #063 · O meu bairro #2: uma praça ao fim da tarde (terça, 30 mar)

**Ideia:** segundo episódio de 'O meu bairro': uma praça pequena de uma vila do Tâmega/Penafiel imaginada a partir do que conheces — igreja, café, jardim, coreto. Imagem de ambiente, humana e quente.

**1. Modelo 3D (25 min)**
- Praça 40 × 30 m em calçada, uma igreja simples de fachada branca com cunhais em granito e torre sineira, café de esquina com esplanada, coreto octogonal, 4 árvores (plátanos), bancos.
- Edifícios de 2–3 pisos nas laterais, em cores claras.
- Candeeiros de ferro, um fontanário.

**2. Câmaras (3), 4:5**
- A: 24 mm, de uma esquina, a praça inteira com a igreja ao fundo.
- B: 40 mm, esplanada do café com cadeiras e a luz nos plátanos.
- C: 70 mm, o coreto com a igreja desfocada atrás.

**3. Luz:** fim de tarde, sol baixo a 12° atravessando as folhas dos plátanos; candeeiros acesos a começar; céu limpo a ficar rosa.

**4. Render base:** Render 1600 px; calçada de granito e calcário, reboco branco, telhas, folhagem verde-dourada. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same square, same buildings and camera as the reference image. A small village square in northern Portugal at golden hour, granite and limestone cobblestones, a simple white church with granite corner stones and a bell tower, a corner café with a terrace of wooden chairs, an octagonal bandstand, four plane trees filtering low warm sunlight, wrought-iron street lamps just turning on, pale two- and three-storey houses around the square, a soft pink sky, welcoming and unhurried, fine film grain, no people, no readable text or signs.
```
Regra: as fachadas e a igreja ficam iguais entre câmaras; a AI pode variar folhagem e céu, não o desenho dos edifícios.

**6. Entrega:** 3 finais em "#063 - O meu bairro 2 praca / final". Para reel: câmara A, 6 s, sombras das folhas a mexer e sol a baixar (Seedance), som ambiente de praça.

**Legenda**
- EN: "Daily Study #063 · My neighbourhood #2: a village square at the end of the afternoon. The best architecture is the kind that makes you stay."
- PT: "Daily Study #063 · O meu bairro #2: uma praça ao fim da tarde. A melhor arquitetura é a que nos faz ficar."

---

## #064 · Casa para um cliente imaginário #5: a fotógrafa (quinta, 1 abr)

**Ideia:** quinto cliente imaginário: uma fotógrafa que vive e trabalha numa antiga garagem convertida. Espaço único, claraboia a todo o comprimento, parede branca para fundo de fotografia, mesa de trabalho e prateleiras com caixas de arquivo. Imagem de ambiente calma, quase de revista.

**1. Modelo 3D (25 min)**
- Volume 9 × 5 m, pé-direito 4 m, claraboia linear de 1 m de largura ao longo do eixo; piso em betão polido; parede branca contínua com um rolo de papel de fundo cinzento no canto.
- Mesa comprida em carvalho com dois monitores e uma lâmpada; prateleiras metálicas com caixas de arquivo; um tripé e um rebatedor encostados à parede.
- Pequena zona de estar: sofá baixo e uma planta grande (ficus).

**2. Câmaras (3), 4:5**
- A: 24 mm, do fundo, o espaço inteiro com a claraboia a riscar o teto.
- B: 40 mm, a mesa de trabalho em ângulo, luz lateral.
- C: 70 mm, o tripé e o rebatedor com a parede branca desfocada.

**3. Luz:** dia de céu encoberto luminoso, luz zenital difusa e suave pela claraboia, sem sombras duras; só o brilho dos monitores como luz quente.

**4. Render base:** Render 1600 px; betão polido com reflexo ténue, carvalho natural, metal pintado de cinzento. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same room, same furniture and camera as the reference image. A photographer's studio in a converted garage, polished concrete floor, a long linear skylight spilling soft diffused overcast daylight, a long oak work table with two monitors, grey metal shelves with archive boxes, a tripod and a reflector leaning on a white wall, a grey paper backdrop roll in the corner, a large ficus plant, calm editorial atmosphere, fine film grain, no people, no readable text.
```
Regra: a claraboia tem de ficar com a mesma largura e posição nas 3 câmaras; a AI pode variar objetos pequenos nas prateleiras, não a arquitetura.

**6. Entrega:** 3 finais em "#064 - Cliente imaginario 5 fotografa / final". Para reel: câmara A, 6 s, nuvens a passarem na claraboia e a luz a variar devagar (Seedance), som de estúdio silencioso.

**Legenda**
- EN: "Daily Study #064 · Imaginary client #5: the photographer. One skylight, one white wall, a studio that lets the light do the work."
- PT: "Daily Study #064 · Cliente imaginário #5: a fotógrafa. Uma claraboia, uma parede branca, um estúdio que deixa a luz trabalhar."

---

## #065 · Casas de Portugal #9: monte alentejano (sábado, 3 abr)

**Ideia:** nono episódio de 'Casas de Portugal': um monte alentejano caiado de branco com barra azul-cobalto, chaminé cónica, sobreiros e uma planície dourada. Imagem de verão: calor, silêncio, sombra.

**1. Modelo 3D (25 min)**
- Volume térreo em L, 18 × 8 m, paredes caiadas, barra azul de 60 cm junto ao chão; telhado de telha de canudo; chaminé alentejana cónica.
- Alpendre com pilares quadrados e uma mesa de madeira; poço circular caiado no pátio; muro baixo de pedra solta.
- 3 sobreiros e uma oliveira velha; terreno plano com restolho dourado.

**2. Câmaras (3), 4:5**
- A: 28 mm, o monte inteiro com a planície e o céu.
- B: 40 mm, alpendre e mesa à sombra, com a luz branca no pátio.
- C: 85 mm, a chaminé cónica contra o céu azul.

**3. Luz:** início da tarde de agosto, sol alto e duro, sombras curtas e nítidas, céu azul profundo com um fiapo de nuvem; contraste forte entre cal e sombra.

**4. Render base:** Render 1600 px; cal branca com ligeira textura, azul-cobalto na barra, telha em tons de barro, restolho amarelo-palha. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same house, same geometry and camera as the reference image. A traditional whitewashed Alentejo farmhouse in Portugal with a cobalt-blue baseboard stripe, a conical chimney, an L-shaped plan with a shaded porch and a wooden table, a whitewashed round well in the courtyard, a low dry-stone wall, old cork oaks and an olive tree, golden stubble fields to the horizon, bright high midday summer sun, crisp short shadows, deep blue sky, silent and warm, fine film grain, no people, no text.
```
Regra: o desenho do monte e a barra azul ficam iguais; a AI pode variar a vegetação e o céu, não os volumes.

**6. Entrega:** 3 finais em "#065 - Casas de Portugal 9 Alentejo / final". Para reel: câmara A, 6 s, vento a mexer no restolho e sombras das nuvens a deslizar (Seedance), som de cigarras.

**Legenda**
- EN: "Daily Study #065 · Houses of Portugal #9: an Alentejo farmhouse. White walls, a blue stripe, and nothing but sky."
- PT: "Daily Study #065 · Casas de Portugal #9: um monte alentejano. Paredes brancas, uma barra azul e mais nada além do céu."

---

## #066 · Abecedário arquitetónico #5: E de Empena (terça, 6 abr)

**Ideia:** quinto episódio do 'Abecedário arquitetónico': E de Empena (a parede triangular de topo do telhado). Uma fila de casas geminadas só com as empenas a recortarem o céu, num bairro de rua inclinada. Imagem gráfica, quase uma ilustração em 3D realista.

**1. Modelo 3D (25 min)**
- Rua inclinada de 6 m de largura; 5 casas geminadas de 3 pisos, cada uma com empena diferente em largura mas todas com telhado de duas águas; fachadas em rebocos de cores suaves (creme, rosa-seco, verde-água, ocre, cinza-quente).
- Janelas pequenas e portas em madeira; chaminés de tijolo; um fio de roupa entre duas janelas.
- Calçada em granito.

**2. Câmaras (3), 4:5**
- A: 35 mm, a rua em perspetiva descendente, empenas em fila.
- B: 50 mm, frontal às empenas, quase plana, ritmo e cor.
- C: 85 mm, duas empenas e o céu, contraste de cores.

**3. Luz:** manhã clara de céu limpo, sol baixo de lado a rasar as fachadas, sombras longas e nítidas nos beirais.

**4. Render base:** Render 1600 px; reboco liso com mancha ligeira, telha cerâmica, tijolo à vista nas chaminés. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same street, same houses and camera as the reference image. A row of narrow terraced houses on a gently sloping cobbled street, each with a different gable end against a clear sky, soft plaster colours in cream, dusty pink, sage green, ochre and warm grey, small timber windows, brick chimneys, a clothesline between two windows, low raking morning sun, crisp long shadows under the eaves, graphic and calm, fine film grain, no people, no readable text.
```
Regra: as larguras e as alturas das empenas têm de ser as mesmas nas 3 câmaras — a graça é o ritmo da silhueta.

**6. Entrega:** 3 finais em "#066 - Abecedario 5 E de Empena / final". Para reel: câmara C, 5 s, sombra a deslizar pelas fachadas (Seedance), som de rua de manhã.

**Legenda**
- EN: "Daily Study #066 · Architectural alphabet #5: E for Empena (gable). Five roofs, five colours, one skyline."
- PT: "Daily Study #066 · Abecedário arquitetónico #5: E de Empena. Cinco telhados, cinco cores, um só horizonte."

---

## #067 · Produto numa pedra clara: um frasco de perfume (quinta, 8 abr)

**Ideia:** episódio de produto: um frasco de perfume de vidro sobre travertino, com cáusticas de água e sombra de uma folha. Fotografia de produto de campanha, minimalista, sem marca real (rótulo inventado, ilegível).

**1. Modelo 3D (25 min)**
- Frasco paralelepipédico de vidro grosso 6 × 3 × 9 cm com tampa de latão fosco e líquido âmbar; bloco de travertino com bordas arredondadas; plano de fundo curvo em bege.
- Um ramo de oliveira (2 folhas) a fazer sombra; uma poça rasa de água ao lado.
- Rótulo branco sem texto legível.

**2. Câmaras (3), 4:5**
- A: 85 mm, o frasco centrado com a pedra, ligeiramente de baixo.
- B: 100 mm, três quartos, a tampa de latão com reflexo.
- C: macro 120 mm, o líquido âmbar e a refração no vidro.

**3. Luz:** luz dura lateral de projetor (spot) a 35° para sombras definidas + preenchimento suave oposto; cáusticas de água projetadas na pedra.

**4. Render base:** Render 1600 px; vidro com refração real (IOR 1.5), travertino com furos pequenos e veios, latão escovado. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic luxury product photograph, same bottle, same stone and camera as the reference image. A thick glass perfume bottle with an amber liquid and a matte brushed-brass cap, resting on a rounded block of cream travertine, soft water caustics dancing on the stone, the crisp shadow of an olive branch, a shallow puddle beside it, warm beige curved backdrop, hard directional studio light with soft fill, subtle glass refraction, minimal campaign style, fine film grain, blank unreadable label, no logos, no text.
```
Regra: as proporções do frasco e o âmbar do líquido têm de ser iguais; a AI não pode inventar texto no rótulo.

**6. Entrega:** 3 finais em "#067 - Produto perfume travertino / final". Para reel: câmara B, 5 s, cáusticas a mexer na pedra e uma gota a cair na poça (Seedance), som suave de água.

**Legenda**
- EN: "Daily Study #067 · Product study: perfume on travertine. Glass, stone, water, and one olive branch of shadow."
- PT: "Daily Study #067 · Estudo de produto: perfume sobre travertino. Vidro, pedra, água e uma sombra de oliveira."

---

## #068 · Desafio de cor #5: verde-oliveira (sábado, 10 abr)

**Ideia:** quinto desafio de cor: uma cozinha/sala de jantar pequena em que domina o verde-oliveira (cinzento-esverdeado, fosco, não folha de bananeira), com madeira clara e cerâmica branca. O carrossel termina com a paleta de 5 cores tirada da imagem.

**1. Modelo 3D (25 min)**
- Cozinha 3,5 × 3 m: armários de baixo e de cima lacados em verde-oliveira mate, bancada em pedra clara, torneira de latão; prateleira aberta com louça branca e uma tábua de madeira.
- Parede em azulejo branco liso 10 × 10; piso em madeira clara; uma mesinha redonda com dois bancos de carvalho.
- Janela pequena com vaso de ervas aromáticas.

**2. Câmaras (3), 4:5**
- A: 28 mm, a cozinha inteira, verde em primeiro plano.
- B: 50 mm, bancada e prateleira em ângulo.
- C: macro 100 mm, a porta do armário verde com a luz a roçar a superfície.

**3. Luz:** manhã de luz lateral suave pela janela; sem luz artificial; sombras longas e macias.

**4. Render base:** Render 1600 px; lacado mate com micro-textura (bump muito leve), pedra clara, azulejo com juntas finas. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same kitchen, same cabinets and camera as the reference image. A small kitchen with matte olive-green lacquered cabinets, a pale stone countertop, a brushed brass tap, an open shelf with white ceramics and a wooden chopping board, plain white square tiles, a light oak floor, a small round table with two oak stools, a window with herb pots, soft raking morning light, olive green as the single dominant colour, editorial interior photography, fine film grain, no people, no text.
```
Regra: o verde tem de ser o MESMO nas 3 (conta-gotas: aproximadamente #6b7254); corrige em edição antes de tirar a paleta.

**6. Entrega:** 3 finais em "#068 - Desafio de cor 5 verde oliveira / final". Para reel: câmara C, 5 s, a luz a deslizar pela superfície do armário (Seedance).

**Legenda**
- EN: "Daily Study #068 · Colour challenge #5: olive green. One kitchen, one colour, one slow morning. Next colour? Tell me below."
- PT: "Daily Study #068 · Desafio de cor #5: verde-oliveira. Uma cozinha, uma cor, uma manhã devagar. Próxima cor? Diz-me aqui em baixo."

---

## #069 · Brief de concurso #3: uma biblioteca de rua (terça, 13 abr)

**Ideia:** terceiro 'concurso imaginário': um pequeno pavilhão-biblioteca de rua para uma praça. Estrutura leve em madeira e vidro, prateleiras viradas para fora, banco e bolsa de sombra. Imagem de concurso: simples, convidativa, escala humana.

**1. Modelo 3D (25 min)**
- Pavilhão 4 × 3 m, cobertura plana em consola com 60 cm de beiral; estrutura de pilares de madeira de 12 cm; paredes laterais em vidro; prateleiras exteriores em carvalho com livros (blocos simples coloridos).
- Banco corrido em redor; piso em lajes de granito; uma árvore (tília) ao lado.
- Uma bicicleta encostada para escala.

**2. Câmaras (3), 4:5**
- A: 28 mm, a praça com o pavilhão em segundo plano.
- B: 35 mm, de frente, as prateleiras e o banco (a imagem do concurso).
- C: 70 mm, os livros e a luz no vidro, bicicleta desfocada.

**3. Luz:** fim de manhã, sol de lado a 40°, céu azul com nuvens baixas e macias; reflexos no vidro.

**4. Render base:** Render 1600 px; carvalho claro com veio, vidro com reflexo ligeiro, granito claro. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural competition image, same pavilion, same geometry and camera as the reference image. A tiny street library pavilion in a European square, a slim timber post structure with a flat overhanging roof, glass side walls, open oak bookshelves filled with books on the outside, a continuous built-in bench, light granite paving, a linden tree beside it, a bicycle leaning for scale, late-morning sun from the side, soft clouds, reflections on the glass, inviting and light, fine film grain, no people, no readable text.
```
Regra: a cobertura em consola e a espessura dos pilares ficam iguais entre câmaras; os livros podem variar.

**6. Entrega:** 3 finais em "#069 - Concurso 3 Biblioteca de rua / final". Para reel: câmara B, 6 s, sombras da tília a mexer sobre as prateleiras (Seedance), som de praça ao fundo.

**Legenda**
- EN: "Daily Study #069 · Imaginary competition #3: a street library. A roof, some shelves, and a reason to stop in the square."
- PT: "Daily Study #069 · Concurso imaginário #3: uma biblioteca de rua. Um telhado, umas prateleiras e uma razão para parar na praça."

---

## #070 · Casa para um cliente imaginário #6: o apicultor (quinta, 15 abr)

**Ideia:** sexto cliente imaginário: um apicultor que quer viver numa encosta com os seus colmeais. Dois volumes simples ligados por um alpendre: a casa e a "casa do mel" (sala de extração). Imagem calma de fim de tarde, com caixas de abelhas ao fundo.

**1. Modelo 3D (25 min)**
- Casa 8 × 4 m em alvenaria caiada, cobertura de uma água em chapa lacada cinzenta; anexo 4 × 4 m em madeira escura (casa do mel); alpendre coberto de 2,5 m entre os dois, com pilares de madeira.
- Encosta em socalcos (3 degraus de terra com muros de pedra seca); 6 colmeias (caixas de madeira pintadas em branco, azul e amarelo) sobre estrados; um muro baixo e um caminho de terra batida.
- Duas oliveiras e erva alta como blocos simples.

**2. Câmaras (3), 4:5**
- A: 24 mm, de baixo da encosta, casa e colmeias em camadas.
- B: 40 mm, o alpendre entre os dois volumes, banco de madeira e potes.
- C: 85 mm, as colmeias coloridas com a casa desfocada atrás.

**3. Luz:** fim de tarde, sol baixo de lado a 15°, luz dourada, sombras longas; céu limpo com um fio de nuvens.

**4. Render base:** Render 1600 px; cal com micro-rugosidade, madeira queimada escura, pedra seca com juntas irregulares. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same house, same buildings and camera as the reference image. A small whitewashed house with a grey standing-seam roof next to a dark charred-timber honey house, joined by a covered timber porch, on a terraced hillside with dry stone walls, six painted wooden beehives (white, blue, yellow) on low stands, two olive trees and tall dry grass, a dirt path, low golden evening sun from the side, long soft shadows, calm rural atmosphere, fine film grain, no people, no text.
```
Regra: o número e a posição das colmeias ficam iguais entre câmaras; a AI não acrescenta janelas nem altera o alpendre.

**6. Entrega:** 3 finais em "#070 - Cliente imaginario 6 apicultor / final". Para reel: câmara C, 6 s, abelhas pequenas a voar à frente das colmeias e o capim a mexer (Seedance), som de zumbido suave.

**Legenda**
- EN: "Daily Study #070 · Imaginary client #6: the beekeeper. Two simple volumes, six hives, and a porch for the evening light."
- PT: "Daily Study #070 · Cliente imaginário #6: o apicultor. Dois volumes simples, seis colmeias e um alpendre para a luz do fim de tarde."

---

## #071 · Casas de Portugal #10: Madeira, a casa de colmo de Santana (sábado, 17 abr)

**Ideia:** décima 'Casas de Portugal': a casa tradicional de Santana, na Madeira, de telhado triangular de colmo até ao chão, paredes pintadas de vermelho, branco e azul, entre hortênsias e bananeiras. Casa pequena, forma muito simples: ideal para 3D rápido.

**1. Modelo 3D (25 min)**
- Casa em A: prisma triangular 5 m de largura × 6 m de profundidade × 5 m de altura; cobertura de colmo em dois planos até ao chão (textura de palha, espessura 25 cm); empena frontal em madeira com porta e uma janela pequena, pintada em vermelho e branco, com moldura azul.
- Uma pequena chaminé em pedra; escada de 3 degraus em basalto; canteiro de hortênsias (blocos esféricos azuis/rosa); muro baixo em basalto escuro.
- Fundo: encosta verde com árvores e névoa leve.

**2. Câmaras (3), 4:5**
- A: 35 mm, a casa inteira de frente, ligeiramente de baixo.
- B: 50 mm, três quartos, a empena com a porta e as hortênsias.
- C: 85 mm, a textura do colmo com a luz rasante e um pouco da empena.

**3. Luz:** manhã húmida, céu encoberto luminoso, luz suave e fria, névoa fina na encosta; cores saturadas mas elegantes.

**4. Render base:** Render 1600 px; colmo com fibras (displacement leve), madeira pintada com ligeiro desgaste, basalto escuro húmido. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same house, same thatched roof and camera as the reference image. A traditional triangular A-frame cottage from Santana, Madeira, with a steep thatched straw roof reaching almost to the ground, a painted timber gable in red and white with blue trim, a small door and window, a short basalt stone stair, blue and pink hydrangeas in front, a low dark basalt wall, lush green mountainside behind with light mist, soft overcast morning light, damp air, fine film grain, no people, no text.
```
Regra: a inclinação do telhado e a proporção da empena não mudam entre câmaras; o colmo tem de parecer palha de verdade, não relva.

**6. Entrega:** 3 finais em "#071 - Casas de Portugal 10 Madeira / final". Para reel: câmara A, 6 s, a névoa a descer pela encosta atrás da casa (Seedance), som de vento e pássaros.

**Legenda**
- EN: "Daily Study #071 · Houses of Portugal #10: Madeira. A roof that reaches the ground, and the one house everyone recognises."
- PT: "Daily Study #071 · Casas de Portugal #10: Madeira. Um telhado que chega ao chão, e a casa que toda a gente reconhece."

---

## #072 · Abecedário arquitetónico #6: F de Fresta (terça, 20 abr)

**Ideia:** sexta letra: F de Fresta, a abertura estreita e vertical que deixa entrar um fio de luz. Interior de parede grossa em pedra ou taipa com três frestas de alturas diferentes e a luz a cair no chão. Imagem quase abstrata, de grande contraste.

**1. Modelo 3D (20 min)**
- Sala vazia 5 × 4 m, pé-direito 3,5 m; parede principal com 60 cm de espessura em pedra rebocada, com 3 frestas verticais (10 cm × 120 cm, 10 × 180 cm, 10 × 90 cm), com abas inclinadas para dentro (ombreira em funil).
- Piso em lajes de calcário; um banco de pedra encostado à parede; um pequeno vaso de barro com um ramo seco.

**2. Câmaras (3), 4:5**
- A: 35 mm, a parede inteira com as 3 frestas e o chão.
- B: 70 mm, só uma fresta com a profundidade da parede visível.
- C: 100 mm, a barra de luz no chão com o banco e o ramo.

**3. Luz:** sol baixo a 25° a entrar pelas frestas, três lâminas de luz no chão; resto da sala em penumbra com um pouco de luz refletida.

**4. Render base:** Render 1600 px; reboco áspero (bump forte), calcário com veios, partículas de poeira no ar (volumetria muito leve). Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural interior photograph, same room, same wall and camera as the reference image. A thick rough lime-plastered stone wall with three narrow vertical slit windows of different heights, splayed reveals, sharp blades of low golden sunlight falling across a limestone floor, a simple stone bench, a terracotta pot with a dry branch, deep soft shadows, fine dust in the beams, quiet and almost abstract, fine film grain, no people, no text.
```
Regra: as 3 frestas têm de manter alturas e posições; as lâminas de luz no chão têm de bater certo com as frestas da câmara A.

**6. Entrega:** 3 finais em "#072 - Abecedario 6 F de Fresta / final". Para reel: câmara C, 5 s, a lâmina de luz a deslizar devagar no chão como um relógio de sol (Seedance), silêncio com um sino ao longe.

**Legenda**
- EN: "Daily Study #072 · Architectural alphabet #6: F is for Fresta. A slit in a thick wall, and the whole day arrives as a blade of light."
- PT: "Daily Study #072 · Abecedário arquitetónico #6: F de Fresta. Uma fenda numa parede grossa, e o dia inteiro chega como uma lâmina de luz."

---

## #073 · Produto em penumbra: um candeeiro de vidro opalino (quinta, 22 abr)

**Ideia:** episódio de produto: um candeeiro de mesa de vidro opalino (esfera sobre base fina de latão), aceso numa mesa de carvalho escuro, numa sala em penumbra ao fim do dia. O próprio produto é a fonte de luz. Marca e rótulo inexistentes.

**1. Modelo 3D (20 min)**
- Esfera de 22 cm de diâmetro em vidro opalino leitoso sobre haste de latão fino de 25 cm e base circular de 12 cm.
- Mesa de carvalho escuro (bloco simples), um livro fechado e um copo com água; parede ao fundo em reboco cinzento-quente.
- Cabo discreto por trás da base.

**2. Câmaras (3), 4:5**
- A: 70 mm, o candeeiro centrado, mesa e parede visíveis.
- B: 100 mm, três quartos, o brilho no vidro e o latão a refletir.
- C: macro 120 mm, a transição luz-sombra no vidro e na madeira.

**3. Luz:** só a luz do próprio candeeiro (emissor quente 2700 K) + um tom frio muito ténue da janela (azul-escuro) a rebater na parede; ambiente em penumbra.

**4. Render base:** Render 1600 px (poucas amostras extra por causa do emissor); vidro opalino com subsurface suave, latão escovado, carvalho escuro com veio. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic product photograph, same lamp, same table and camera as the reference image. An opal milk-glass globe table lamp on a thin brushed-brass stem, glowing warm 2700K, standing on a dark oak table beside a closed book and a glass of water, a warm-grey plaster wall behind, a faint cool blue dusk light from a window, intimate low-key atmosphere, soft glow falloff on the wall, subtle glass and brass reflections, fine film grain, no logos, no text.
```
Regra: a intensidade e a cor do brilho têm de ser iguais nas 3 câmaras; sem halos exagerados.

**6. Entrega:** 3 finais em "#073 - Produto candeeiro opalino / final". Para reel: câmara B, 5 s, o candeeiro a acender devagar de 0 a 100% (Seedance ou fade em edição), som de interruptor e silêncio.

**Legenda**
- EN: "Daily Study #073 · Product study: an opal glass lamp. The only light in the room is the object itself."
- PT: "Daily Study #073 · Estudo de produto: candeeiro de vidro opalino. A única luz da sala é o próprio objeto."

---

## #074 · Desafio de cor #6: rosa-velho (sábado, 24 abr)

**Ideia:** sexto desafio de cor: um quarto de dormir com rosa-velho (um rosa poeirento, quase nude) dominante, com cinzento-quente e madeira clara. O carrossel termina com a paleta de 5 cores tirada da imagem.

**1. Modelo 3D (25 min)**
- Quarto 4 × 3,5 m: parede da cabeceira pintada em rosa-velho mate; cama baixa com roupa de cama em linho cru; cabeceira em carvalho claro; duas mesas de cabeceira redondas.
- Cortina de linho em tom areia, janela alta; tapete cinzento-quente; um candeeiro de papel e um quadro abstrato grande (só cor, sem figuras).

**2. Câmaras (3), 4:5**
- A: 28 mm, a cama de frente com a parede rosa inteira.
- B: 50 mm, a mesa de cabeceira e o candeeiro em ângulo.
- C: 85 mm, o linho da cama e a textura da parede.

**3. Luz:** manhã de luz suave pela cortina, quente, sem sombras duras; ligeiro brilho no linho.

**4. Render base:** Render 1600 px; tinta mate com micro-textura, linho com trama visível, carvalho claro. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same bedroom, same furniture and camera as the reference image. A calm bedroom with a matte dusty old-rose pink accent wall as the single dominant colour, a low bed with raw linen bedding and a light oak headboard, two round bedside tables, a sand linen curtain filtering soft morning light, a warm grey rug, a paper pendant lamp, a large abstract colour-field painting, editorial interior photography, fine film grain, no people, no text.
```
Regra: o rosa tem de ser o MESMO nas 3 (conta-gotas: aproximadamente #c9a49a); corrige em edição antes de tirar a paleta.

**6. Entrega:** 3 finais em "#074 - Desafio de cor 6 rosa velho / final". Para reel: câmara C, 5 s, a cortina a mexer com a brisa e a luz a oscilar no linho (Seedance).

**Legenda**
- EN: "Daily Study #074 · Colour challenge #6: dusty rose. One bedroom, one colour, one soft morning. Next colour? Tell me below."
- PT: "Daily Study #074 · Desafio de cor #6: rosa-velho. Um quarto, uma cor, uma manhã suave. Próxima cor? Diz-me aqui em baixo."

---

## #075 · O meu bairro #3: uma ruela com roupa estendida (terça, 27 abr)

**Ideia:** terceiro 'O meu bairro': uma ruela estreita de casas baixas com cordas de roupa estendida de um lado ao outro. Cena do quotidiano, cores vivas nos panos, pedra e reboco gastos. Imagem alegre e humana, sem pessoas.

**1. Modelo 3D (25 min)**
- Ruela de 2,5 m de largura e 18 m de comprimento; casas de 2 pisos dos dois lados com fachadas rebocadas (branco-sujo, ocre, verde-água), portas de madeira, janelas com grades de ferro e vasos.
- 4 cordas de varal de lado a lado com panos simples (retângulos de tecido com ligeira ondulação em cores vivas); piso de calçada irregular (pedra pequena); degrau à entrada; um gato em cima de um muro (bloco simples).
- Um fio elétrico e uma lanterna de parede para realismo.

**2. Câmaras (3), 4:5**
- A: 24 mm, ao centro da ruela a olhar para o fundo, perspectiva profunda com as cordas.
- B: 50 mm, um conjunto de panos com a fachada ocre e uma porta.
- C: 85 mm, ao nível do olhar, o gato e o degrau em primeiro plano, ruela desfocada.

**3. Luz:** fim de manhã, sol alto a entrar na ruela só a meio (faixa de luz diagonal), o resto em sombra azulada; panos a brilhar à luz.

**4. Render base:** Render 1600 px; reboco desgastado com manchas, calçada com variação, tecidos com translucência leve. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic street photograph, same alley, same buildings and camera as the reference image. A narrow whitewashed old-town alley with two-storey houses in off-white, ochre and sage plaster, wooden doors, iron window grilles with flower pots, four clotheslines strung across the alley with colourful hanging cloths, uneven small-stone paving, a cat sitting on a low wall, a diagonal band of late-morning sunlight with blue shade elsewhere, lived-in and cheerful, fine film grain, no people, no readable text.
```
Regra: o número de cordas e a posição dos panos têm de ser iguais entre câmaras; a AI não pode inventar pessoas nem letreiros.

**6. Entrega:** 3 finais em "#075 - O meu bairro 3 ruela com roupa / final". Para reel: câmara A, 6 s, os panos a balançar ao vento ao longo da ruela (Seedance), som de rua, rádio ao longe.

**Legenda**
- EN: "Daily Study #075 · My neighbourhood #3: a laundry alley. Four lines, a patch of sun, and the street's whole palette hanging overhead."
- PT: "Daily Study #075 · O meu bairro #3: uma ruela com roupa estendida. Quatro cordas, uma nesga de sol e toda a paleta da rua pendurada por cima."

---

## #076 · Casa para um cliente imaginário #7: a ceramista (quinta, 29 abr)

**Ideia:** sétimo cliente imaginário: uma ceramista que precisa de casa e ateliê juntos. Um volume baixo de tijolo com um forno exterior em cúpula e um pátio de secagem. Imagem de manhã fresca, com tábuas de peças a secar ao sol.

**1. Modelo 3D (25 min)**
- Casa-ateliê 10 × 5 m em tijolo à vista (cor terra), cobertura plana com beiral fino; grande janela corrida para o ateliê; porta de madeira clara.
- Pátio 5 × 5 m em terra batida e lajes, com 3 estantes de madeira (blocos simples) com peças (cilindros e esferas achatadas) a secar.
- Forno exterior em cúpula (meia esfera de 1,8 m) em tijolo refratário claro com chaminé; um monte de lenha empilhada; uma figueira como bloco simples.

**2. Câmaras (3), 4:5**
- A: 28 mm, fachada de tijolo com o forno em primeiro plano.
- B: 50 mm, as estantes de secagem com a janela do ateliê atrás.
- C: 85 mm, o forno em cúpula e a lenha, detalhe de tijolo.

**3. Luz:** manhã fresca, sol baixo a 25° de lado, sombras suaves e longas; céu limpo, ligeiro azul frio nas sombras.

**4. Render base:** Render 1600 px; tijolo com juntas em argamassa clara e variação de tom, barro cru nas peças, madeira clara. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same house, same kiln and camera as the reference image. A low flat-roofed brick house and ceramics studio with a long timber-framed window and a light wooden door, a domed outdoor brick kiln with a short chimney, wooden drying shelves with unfired clay pots in a packed-earth courtyard, a stack of firewood, a fig tree, cool fresh morning light with a low side sun and soft long shadows, fine film grain, no people, no text.
```
Regra: o número de peças nas estantes e o desenho do forno têm de ser iguais entre câmaras; a AI não acrescenta janelas.

**6. Entrega:** 3 finais em "#076 - Cliente imaginario 7 ceramista / final". Para reel: câmara B, 5 s, sombra a atravessar as estantes e um fio de fumo do forno (Seedance), som de pássaros e barro a ser trabalhado ao longe.

**Legenda**
- EN: "Daily Study #076 · Imaginary client #7: the ceramicist. A brick studio, a domed kiln and shelves of clay drying in the morning sun."
- PT: "Daily Study #076 · Cliente imaginário #7: a ceramista. Um ateliê de tijolo, um forno em cúpula e prateleiras de barro a secar ao sol da manhã."

---

## #077 · Casas de Portugal #11: Açores, a casa de basalto (sábado, 1 mai)

**Ideia:** décima primeira casa de Portugal: uma casa açoriana em pedra de basalto escura, com cantarias brancas nas janelas e portas, rodeada de hortênsias e muros de pedra. Névoa baixa e luz difusa.

**1. Modelo 3D (25 min)**
- Casa 9 × 6 m de 1 piso e sótão, paredes em basalto (textura escura rugosa), cantarias e cunhais brancos; telhado de 4 águas em telha cerâmica; chaminé larga.
- Portada principal com moldura branca e duas janelas de guilhotina simétricas; um pequeno alpendre lateral.
- Muro de pedra seca à frente (0,9 m) com portão de ferro; filas de hortênsias como bolas verdes e azuis (blocos simples); prado inclinado atrás e uma faixa de cedros.

**2. Câmaras (3), 4:5**
- A: 28 mm, fachada de frente com o muro e as hortênsias.
- B: 50 mm, a porta com a cantaria branca e o basalto.
- C: 85 mm, hortênsias em primeiro plano e a casa desfocada atrás.

**3. Luz:** céu encoberto com névoa baixa, luz difusa sem sombras duras; cores húmidas e saturadas (o verde e o azul das hortênsias).

**4. Render base:** Render 1600 px; basalto com poros e humidade, cal branca limpa, telha envelhecida. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same house, same garden and camera as the reference image. A traditional Azorean house in dark volcanic basalt stone with white lime-painted stone window surrounds and corner quoins, a hipped terracotta tile roof, a wide chimney, a low dry-stone wall with an iron gate, rows of blue and green hydrangeas, a green sloping meadow and a line of cedar trees behind, low mist and soft overcast diffuse light, damp saturated colours, fine film grain, no people, no text.
```
Regra: a cantaria branca tem de ficar nos mesmos sítios nas 3 câmaras; as hortênsias não podem tapar a porta.

**6. Entrega:** 3 finais em "#077 - Casas de Portugal 11 Acores / final". Para reel: câmara A, 6 s, a névoa a deslizar devagar pela encosta atrás da casa (Seedance), som de vento e mar ao longe.

**Legenda**
- EN: "Daily Study #077 · Houses of Portugal #11: the Azores. Dark basalt, white stone trims and hydrangeas under low mist."
- PT: "Daily Study #077 · Casas de Portugal #11: Açores. Basalto escuro, cantarias brancas e hortênsias sob a névoa baixa."

---

## #078 · Abecedário arquitetónico #7: G de Galeria (terça, 4 mai)

**Ideia:** sétima letra do abecedário: G de Galeria, o corredor coberto que liga e abriga. Uma galeria longa com colunas finas e luz que entra de lado, em ritmo.

**1. Modelo 3D (15 min)**
- Galeria 24 m de comprimento × 3,2 m de largura × 4 m de altura; uma fila de 12 colunas quadradas finas (0,25 m) em betão claro; teto plano em madeira com juntas; piso de pedra clara polida.
- Um dos lados totalmente aberto para um jardim (gravilha e uma árvore de folha caduca); o outro lado uma parede cega caiada com 3 bancos de madeira encastrados.
- Sem objetos; só um vaso grande no fundo para dar escala.

**2. Câmaras (3), 4:5**
- A: 24 mm, plano central ao longo da galeria, fuga simétrica.
- B: 50 mm, as colunas e o jardim em ritmo, ligeiramente de ângulo.
- C: 85 mm, banco e sombra de uma coluna na parede.

**3. Luz:** sol baixo de fim de manhã entrando de lado pelas aberturas, a desenhar faixas de luz e sombra no piso e na parede; contraste forte mas limpo.

**4. Render base:** Render 1600 px; betão claro com microtextura, madeira de pinho no teto, pedra polida com reflexo ténue. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same gallery, same columns and camera as the reference image. A long covered gallery with twelve slender square pale concrete columns, a flat timber-slat ceiling, a polished light stone floor, one side open to a gravel garden with a deciduous tree, the other a blank whitewashed wall with three built-in wooden benches, low late-morning side sun casting rhythmic stripes of light and shadow across floor and wall, serene, fine film grain, no people, no text.
```
Regra: o número de colunas e o ritmo das sombras têm de ser iguais; a AI não pode acrescentar pessoas nem mobiliário.

**6. Entrega:** 3 finais em "#078 - Abecedario 7 G Galeria / final". Para reel: câmara A, 5 s, a luz a deslizar devagar ao longo do piso como se o sol andasse (time-lapse suave em edição), som de passos distantes.

**Legenda**
- EN: "Daily Study #078 · Architectural alphabet #7: G for Gallery. Twelve columns, one rhythm of light."
- PT: "Daily Study #078 · Abecedário arquitetónico #7: G de Galeria. Doze colunas, um ritmo de luz."

---

## #079 · Produto numa bancada de pedra: uma chaleira de ferro fundido (quinta, 6 mai)

**Ideia:** estudo de produto: uma chaleira japonesa de ferro fundido (tetsubin) sobre uma bancada de pedra, com vapor ténue e luz de janela lateral. Imagem sóbria, texturas fortes.

**1. Modelo 3D (20 min)**
- Chaleira: corpo redondo achatado (esfera deformada) de 18 cm, bico curto, tampa com pega pequena, asa em arco de ferro; relevo de pontos pequenos (bossas) por mapa de normal ou geometria simples.
- Bancada de pedra escura (basalto ou ardósia) com bordo em bisel; um copo de cerâmica sem asa e uma colher de madeira.
- Parede de fundo em cal cinzenta; janela fora de campo.

**2. Câmaras (3), 4:5**
- A: 70 mm, a chaleira centrada com a bancada e a parede.
- B: 100 mm, três quartos, o bico e a asa.
- C: macro 120 mm, a textura de bossas do ferro.

**3. Luz:** luz suave de janela lateral (softbox grande à esquerda), contra-luz ténue atrás para recortar o vapor; ambiente discreto e frio-neutro.

**4. Render base:** Render 1600 px; ferro escuro com rugosidade média e reflexo suave, pedra com poros, cerâmica mate. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic product photograph, same kettle, same stone counter and camera as the reference image. A Japanese cast-iron tetsubin kettle with fine raised dot texture on a dark slate counter beside a small handleless ceramic cup and a wooden spoon, a grey lime-plaster wall behind, a thin wisp of steam from the spout, soft window light from the left with a faint rim light behind, restrained and tactile, shallow depth of field, fine film grain, no logos, no text.
```
Regra: o padrão de bossas e o brilho do ferro têm de ser iguais nas 3 câmaras; o vapor só no plano A e B.

**6. Entrega:** 3 finais em "#079 - Produto chaleira ferro / final". Para reel: câmara B, 5 s, o vapor a subir devagar em câmara lenta (Seedance), som de água a ferver baixinho.

**Legenda**
- EN: "Daily Study #079 · Product study: a cast-iron kettle. Dark metal, soft window light and a thread of steam."
- PT: "Daily Study #079 · Estudo de produto: uma chaleira de ferro fundido. Metal escuro, luz suave de janela e um fio de vapor."

---

## #080 · Desafio de cor #7: terracota (sábado, 8 mai)

**Ideia:** sétimo desafio de cor: terracota. Uma sala de estar com paredes e pavimento em terracota quente, madeira clara e linho cru. O carrossel termina com a paleta de 5 cores tirada da imagem.

**1. Modelo 3D (25 min)**
- Sala 5 × 4,5 m: parede principal em reboco terracota mate (microcimento), pavimento em ladrilho terracota hexagonal ou quadrado, rodapé simples.
- Sofá baixo em linho cru, mesa de centro redonda em madeira clara, estante aberta em madeira com três vasos de cerâmica; uma janela alta com cortina de linho.
- Uma planta grande (blocos simples) no canto; tapete em juta.

**2. Câmaras (3), 4:5**
- A: 28 mm, a sala inteira com parede e piso terracota.
- B: 50 mm, o sofá e a mesa em ângulo.
- C: 85 mm, a estante e os vasos, texturas do reboco.

**3. Luz:** fim de tarde, sol dourado baixo entrando pela janela, quente, a bater na parede terracota; sombras suaves.

**4. Render base:** Render 1600 px; microcimento com nuvens de tom, ladrilho com juntas, linho com trama. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same living room, same furniture and camera as the reference image. A warm living room with matte terracotta plaster walls and terracotta floor tiles as the single dominant colour, a low raw linen sofa, a round light oak coffee table, an open oak shelf with three ceramic vases, a linen curtain, a jute rug, a large green plant, golden late-afternoon sun from a tall window, editorial interior photography, fine film grain, no people, no text.
```
Regra: o terracota tem de ser o MESMO nas 3 (conta-gotas: aproximadamente #b86b4b); corrige em edição antes de tirar a paleta.

**6. Entrega:** 3 finais em "#080 - Desafio de cor 7 terracota / final". Para reel: câmara A, 5 s, o sol dourado a deslocar-se devagar pela parede (edição ou Seedance), som de tarde calma.

**Legenda**
- EN: "Daily Study #080 · Colour challenge #7: terracotta. One room, one colour, one warm afternoon. Next colour? Tell me below."
- PT: "Daily Study #080 · Desafio de cor #7: terracota. Uma sala, uma cor, uma tarde quente. Próxima cor? Diz-me aqui em baixo."

---

## #081 · Brief de concurso #4: um quiosque de música no parque (terça, 11 mai)

**Ideia:** quarto brief de concurso imaginário: um coreto contemporâneo num parque urbano. Estrutura leve em madeira e aço, cobertura circular, banco corrido à volta. Imagem ao fim da tarde com as luzes a acender.

**1. Modelo 3D (25 min)**
- Plataforma circular de 8 m de diâmetro elevada 0,5 m, em betão claro; 8 pilares finos de aço (cor grafite) a sustentar uma cobertura circular de 9 m em lamelas de madeira clara, com beiral fino.
- Banco corrido em madeira à volta da plataforma; 3 degraus de acesso; um piano de cauda simples (bloco) ao centro como escala.
- Parque: relvado, caminhos de gravilha, 5 árvores altas (blocos simples), uma fila de candeeiros baixos.

**2. Câmaras (3), 4:5**
- A: 28 mm, vista ao nível do olhar do caminho, o coreto inteiro com o parque.
- B: 40 mm, vista para dentro, lamelas do teto e o piano.
- C: 85 mm, um pilar fino de aço com o banco de madeira e as luzes ao fundo.

**3. Luz:** golden hour a passar a azul, céu em degradé, luzes quentes (2700 K) acesas nas lamelas e nos candeeiros; contraste entre o interior quente e o parque azulado.

**4. Render base:** Render 1600 px; madeira clara com veio, aço fosco grafite, betão polido. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same pavilion, same park and camera as the reference image. A contemporary circular park bandstand with a light timber-slat canopy on eight slender graphite steel columns, a raised pale concrete platform with a continuous wooden bench around it and a grand piano at the centre, warm 2700K light glowing from the canopy and low park lamps, a long grass lawn and tall trees, a dusk sky fading from gold to deep blue, atmospheric and welcoming, fine film grain, no people, no readable text.
```
Regra: oito pilares e a mesma posição do piano nas 3; a AI não adiciona pessoas nem instrumentos extra.

**6. Entrega:** 3 finais em "#081 - Brief concurso 4 coreto parque / final". Para reel: câmara A, 6 s, as luzes a acender uma a uma ao entardecer (Seedance ou edição), som de uma melodia de piano suave.

**Legenda**
- EN: "Daily Study #081 · Competition brief #4: a bandstand for the park. Eight slim columns, a timber canopy and the lights coming on at dusk."
- PT: "Daily Study #081 · Brief de concurso #4: um coreto para o parque. Oito pilares finos, uma cobertura de madeira e as luzes a acender ao entardecer."

---

## #082 · Casa para um cliente imaginário #8: o relojoeiro (quinta, 13 mai)

**Ideia:** oitavo cliente imaginário: um relojoeiro que vive e trabalha no mesmo sítio. Casa-oficina estreita de dois pisos: bancada junto a uma janela virada a norte no piso térreo, habitação em cima. Luz fria e precisa, madeira escura e latão.

**1. Modelo 3D (25 min)**
- Volume de 5 × 10 m, 2 pisos, fachada em tijolo cinza-escuro com uma grande janela fixa no piso térreo; telhado plano com platibanda fina.
- Oficina: bancada comprida em carvalho escuro encostada à janela, banco alto, candeeiro articulado em latão, 12 relógios de parede simples (círculos com ponteiros) numa parede de painéis; estante de gavetas pequenas.
- Escada de ferro fino para o piso de cima; chão em microcimento escuro.

**2. Câmaras (3), 4:5**
- A: 35 mm, da porta, a bancada junto à janela com a oficina inteira.
- B: 50 mm, a parede de relógios em ligeira diagonal.
- C: 85 mm, o candeeiro de latão e a bancada, fundo desfocado.

**3. Luz:** luz de norte fria e difusa pela janela (5800 K), fraca luz quente (2700 K) só no candeeiro da bancada; contraste calmo, sombras suaves.

**4. Render base:** Render 1600 px; carvalho escuro com veio, latão com reflexos escovados, tijolo fosco. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same watchmaker's workshop, same furniture and camera as the reference image. A narrow home-workshop with a long dark oak workbench under a large north-facing window, a brushed brass articulated lamp glowing warm, a wall of twelve simple round wall clocks, a small-drawer cabinet, a thin black iron stair, dark polished microcimento floor, cool soft diffuse daylight, quiet and precise mood, fine film grain, no people, no readable text.
```
Regra: os 12 relógios na mesma disposição nas 3 câmaras; a AI não inventa ferramentas nem pessoas.

**6. Entrega:** 3 finais em "#082 - Cliente imaginario 8 relojoeiro / final". Para reel: câmara B, 5 s, os ponteiros a andar muito devagar (edição ou Seedance), som de tiquetaque suave.

**Legenda**
- EN: "Daily Study #082 · Imaginary client #8: the watchmaker. A workbench under north light and a wall of clocks keeping slightly different time."
- PT: "Daily Study #082 · Cliente imaginário #8: o relojoeiro. Uma bancada à luz de norte e uma parede de relógios a marcar horas ligeiramente diferentes."

---

## #083 · Casas de Portugal #12: Ria de Aveiro, o palheiro às riscas (sábado, 15 mai)

**Ideia:** décima segunda casa de Portugal: um palheiro da Costa Nova, casa de madeira sobre estacas pintada às riscas verticais, com a ria e o céu de verão. Cor viva e simples, geometria gráfica.

**1. Modelo 3D (20 min)**
- Casa de madeira 6 × 5 m sobre estacas baixas, 2 águas com telhado de telha; riscas verticais largas (3 cores: azul-turquesa, branco, vermelho-tijolo), portas e janelas com moldura branca; pequeno alpendre de degraus.
- Prancha de madeira como passadiço, 2 barcos moliceiros simples (blocos curvos) à frente, canas e areia, uma bicicleta encostada.
- Céu limpo; a ria como plano de água plano.

**2. Câmaras (3), 4:5**
- A: 35 mm, a casa de frente com a ria ao lado.
- B: 50 mm, as riscas e a porta, em diagonal.
- C: 85 mm, as riscas em primeiro plano com a bicicleta desfocada.

**3. Luz:** início da tarde de verão, sol forte mas ligeiramente lateral, sombras definidas nas tábuas; céu azul-claro com pouca nuvem.

**4. Render base:** Render 1600 px; tinta desgastada com micro-fissuras, madeira com veio, água com pequenas ondas. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic photograph, same house, same boardwalk and camera as the reference image. A traditional Costa Nova striped wooden beach house on low stilts, wide vertical stripes in turquoise, white and brick red, white window frames, tiled gable roof, a wooden boardwalk, two moliceiro boats on calm water, reeds and sand, a bicycle leaning against the wall, bright clear early-afternoon summer sun, crisp shadows, fine film grain, no people, no readable text.
```
Regra: a ordem das riscas (turquesa, branco, vermelho) igual nas 3 câmaras; não inventar mais casas.

**6. Entrega:** 3 finais em "#083 - Casas de Portugal 12 Aveiro / final". Para reel: câmara A, 6 s, água a mexer ligeiramente e um barco a deslizar (Seedance), som de gaivotas e brisa.

**Legenda**
- EN: "Daily Study #083 · Houses of Portugal #12: Aveiro. Stripes, stilts and a summer sky: a house built like a graphic poster."
- PT: "Daily Study #083 · Casas de Portugal #12: Aveiro. Riscas, estacas e um céu de verão: uma casa que parece um cartaz."

---

## #084 · Abecedário arquitetónico #8: H de Hall (terça, 18 mai)

**Ideia:** oitava letra: H de Hall, o átrio de entrada. Um hall pequeno mas generoso, com pé-direito duplo, escada escultural, uma única peça de arte e luz zenital. Entrar numa casa e sentir-se bem-vindo.

**1. Modelo 3D (25 min)**
- Hall de 4 × 5 m com pé-direito de 5,5 m; paredes em reboco branco quente, piso em pedra clara com junta fina, porta de entrada em madeira com moldura.
- Escada reta em madeira clara junto a uma parede, corrimão fino em aço negro; banco baixo em pedra ao lado da porta; um grande espelho redondo.
- Clarabóia estreita no teto (80 cm × 3 m) a lançar luz na parede.

**2. Câmaras (3), 4:5**
- A: 24 mm, da porta, o hall com o pé-direito duplo e a escada.
- B: 40 mm, a clarabóia a lançar a faixa de luz na parede.
- C: 85 mm, o banco de pedra e o espelho redondo.

**3. Luz:** luz zenital branca-quente a entrar pela clarabóia (faixa nítida na parede), resto em penumbra suave; um ponto quente num candeeiro de parede.

**4. Render base:** Render 1600 px; reboco liso com micro-variação, pedra com poros, madeira com veio. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same entrance hall, same stair and camera as the reference image. A calm double-height entrance hall with warm white plaster walls, pale stone floor, a straight light-oak staircase with a thin black steel handrail, a low stone bench, a large round mirror, a narrow skylight casting a crisp band of warm daylight on the wall, soft shadow elsewhere, serene and welcoming, fine film grain, no people, no text.
```
Regra: a faixa de luz na mesma parede e inclinação nas 3 câmaras; sem objetos extra.

**6. Entrega:** 3 finais em "#084 - Abecedario 8 H de Hall / final". Para reel: câmara B, 5 s, a faixa de luz a deslizar devagar pela parede (edição), som de silêncio com ligeiro eco de passos.

**Legenda**
- EN: "Daily Study #084 · Architectural alphabet #8: H for Hall. The first room you meet should already feel like a welcome."
- PT: "Daily Study #084 · Abecedário arquitetónico #8: H de Hall. A primeira divisão que se encontra já devia parecer um acolhimento."

---

## #085 · Produto sobre mármore ao amanhecer: uma cafeteira moka (quinta, 20 mai)

**Ideia:** produto quotidiano tratado como objeto de design: uma cafeteira moka de alumínio sobre uma bancada de mármore, vapor a subir, luz rasante de amanhecer pela janela. Imagem quente e íntima.

**1. Modelo 3D (20 min)**
- Cafeteira moka de 6 chávenas (modelo gratuito ou feito com revolução + extrusão: corpo octogonal, bico, pega preta); duas chávenas brancas de café com pires; colher pequena.
- Bancada de mármore branco com veio cinzento (2 m), um pedaço de parede com azulejo branco e uma janela desfocada ao fundo.
- Um pano de linho dobrado; fita fina de vapor (plano com textura, ou fazer na AI).

**2. Câmaras (3), 4:5**
- A: 50 mm, ligeiramente acima, cafeteira, chávenas e pano.
- B: 85 mm, baixo, a cafeteira de lado com o reflexo no mármore.
- C: 100 mm, detalhe da pega e do bico, fundo muito desfocado.

**3. Luz:** sol baixo de amanhecer (3200 K) vindo da janela, rasante e lateral, sombras longas na bancada; vapor a captar a luz.

**4. Render base:** Render 1600 px; alumínio escovado com anisotropia, mármore com veio e leve reflexo, cerâmica brilhante. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic product photograph, same moka pot, same cups and camera as the reference image. A brushed aluminium octagonal moka pot with a black handle on a white marble countertop with grey veining, two white espresso cups on saucers, a folded linen cloth, a thin wisp of steam catching the light, low warm sunrise light from a window raking across the surface, long soft shadows, white tile and a blurred window behind, intimate morning mood, fine film grain, no people, no text.
```
Regra: o mesmo número de chávenas e posição do pano; o vapor nunca tapa a pega.

**6. Entrega:** 3 finais em "#085 - Produto moka marmore / final". Para reel: câmara A, 5 s, o vapor a subir e a luz a mudar de dourada para clara (Seedance), som de café a borbulhar.

**Legenda**
- EN: "Daily Study #085 · Product at sunrise: a moka pot on marble. The first light of the day does most of the design work."
- PT: "Daily Study #085 · Produto ao amanhecer: uma cafeteira moka sobre mármore. A primeira luz do dia faz quase todo o trabalho de design."

---

## #086 · Desafio de cor #8: branco-cal (sábado, 22 mai)

**Ideia:** oitavo desafio de cor, e o mais difícil: o branco. Um espaço caiado quase monocromático, onde só a luz, a textura e a sombra dão volume. Paleta de brancos e cremes (não existe um branco só).

**1. Modelo 3D (25 min)**
- Sala-pátio 5 × 5 m com paredes e abóbada em cal branca, um nicho curvo, um banco corrido em cal, uma porta de madeira branqueada.
- Um vaso grande de cerâmica branca com um ramo de oliveira, um tapete de algodão cru; chão em ladrilho branco-creme.
- Janela arqueada com vista para um pátio com uma figueira.

**2. Câmaras (3), 4:5**
- A: 28 mm, a sala inteira com a abóbada.
- B: 50 mm, o nicho e o banco.
- C: 85 mm, o vaso e o ramo contra a parede.

**3. Luz:** sol alto e duro, uma faixa de luz brilhante no chão e uma sombra azulada suave na parede; sem cores quentes fortes, só gradações.

**4. Render base:** Render 1600 px; cal com micro-relevo (bump forte), ladrilho com junta, algodão com trama. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same whitewashed room, same arch and camera as the reference image. A serene lime-washed room with a barrel-vaulted ceiling, curved niche and built-in bench, all in layered whites and creams, a bleached wooden door, a large white ceramic vase with an olive branch, a raw cotton rug, an arched window onto a courtyard with a fig tree, strong high sun casting a bright band of light on the floor and soft blue-grey shadows on the wall, textured plaster, tonal and quiet, fine film grain, no people, no text.
```
Regra: nada de cores saturadas; o único verde é a oliveira e a figueira. A paleta é tirada em edição com o conta-gotas (5 brancos distintos).

**6. Entrega:** 3 finais em "#086 - Desafio de cor 8 branco-cal / final". Para o carrossel: slide da paleta com `scripts/make_palette.py`. Para reel: câmara A, 5 s, a faixa de sol a deslocar-se pelo chão, som de cigarras ao longe.

**Legenda**
- EN: "Daily Study #086 · Colour challenge #8: lime white. One colour that isn't one: five whites, one patch of sun."
- PT: "Daily Study #086 · Desafio de cor #8: branco-cal. Uma cor que afinal são cinco: cinco brancos e uma nesga de sol."

---

## #087 · O meu bairro #4: o café de esquina às 7 da manhã (terça, 25 mai)

**Ideia:** quarto 'O meu bairro': o café da esquina a abrir. Toldo, esplanada ainda vazia com cadeiras empilhadas, luz fria da manhã e o interior aceso. Cena de rotina, calma e nostálgica.

**1. Modelo 3D (25 min)**
- Prédio de esquina de 3 pisos com café no rés-do-chão: fachada em duas faces, grande montra, porta de vidro e madeira, toldo verde-escuro, letras sem texto legível (placa em branco).
- Esplanada: 4 mesas redondas pequenas, cadeiras de madeira dobradas e encostadas, um quadro de giz; passeio em calçada portuguesa, um candeeiro de rua, um poste de sinalização sem texto.
- Interior: balcão, máquina de café, luzes pendentes quentes (blocos simples).

**2. Câmaras (3), 4:5**
- A: 28 mm, esquina inteira em diagonal.
- B: 50 mm, o toldo e a montra com o interior aceso.
- C: 85 mm, mesas e cadeiras empilhadas em primeiro plano, café desfocado atrás.

**3. Luz:** primeira luz da manhã, céu azul pálido (6500 K) com ligeira névoa, interior muito quente (2700 K) a sair pela montra; contraste frio/quente.

**4. Render base:** Render 1600 px; vidro com reflexos suaves, calçada molhada com brilho, madeira gasta, toldo em tecido. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic street photograph, same corner building, same café and camera as the reference image. A quiet neighbourhood corner café opening at 7 a.m., a three-storey building, large shop window glowing warm from inside, a dark green awning with a blank sign, four small round tables and stacked wooden chairs on the terrace, a chalkboard, Portuguese cobblestone pavement slightly damp, a street lamp still lit, pale blue morning light with thin mist, nostalgic and calm, fine film grain, no people, no readable text.
```
Regra: sem texto legível no toldo e no quadro (a AI costuma inventar); número de mesas igual entre câmaras.

**6. Entrega:** 3 finais em "#087 - O meu bairro 4 cafe de esquina / final". Para reel: câmara B, 6 s, o interior a acender-se e a névoa a levantar (Seedance), som de rua a acordar e de chávenas.

**Legenda**
- EN: "Daily Study #087 · My neighbourhood #4: the corner café at 7 a.m. Chairs still stacked, the window already warm."
- PT: "Daily Study #087 · O meu bairro #4: o café da esquina às 7 da manhã. As cadeiras ainda empilhadas e a montra já quente."

---

## #088 · Casa para um cliente imaginário #9: o tradutor (quinta, 27 mai)

**Ideia:** nono cliente imaginário: um tradutor que passa o dia entre dicionários. Casa pequena de um piso com um escritório-biblioteca de pé-direito alto, uma única janela grande para um pátio verde e um canto de leitura. Luz calma e papel por todo o lado.

**1. Modelo 3D (25 min)**
- Volume de 6 × 9 m, 1 piso, telhado de uma água com clerestório estreito; paredes interiores em estuque cru, chão em tábua de pinho.
- Estantes até ao teto em duas paredes (blocos de livros em 3 tons, sem texto), escada de biblioteca em madeira, secretária comprida em nogueira virada para a janela, candeeiro de mesa de metal.
- Canto de leitura: poltrona de linho e mesa baixa; pátio com uma tília e um banco de pedra.

**2. Câmaras (3), 4:5**
- A: 28 mm, da porta, a sala inteira com a janela ao fundo.
- B: 50 mm, a escada de biblioteca e as estantes em diagonal.
- C: 85 mm, a secretária e o candeeiro, o pátio desfocado.

**3. Luz:** manhã de céu limpo, luz suave e difusa pela janela (5500 K), claraboia estreita a deitar uma faixa de luz nas estantes; lâmpada de secretária quente (2700 K) discreta.

**4. Render base:** Render 1600 px; nogueira com veio, estuque com micro-relevo, linho com trama. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same translator's study, same shelves and camera as the reference image. A calm single-storey home study with floor-to-ceiling bookshelves on two walls, a wooden library ladder, a long walnut desk facing a large window onto a green courtyard with a linden tree, a small linen armchair reading corner, raw plaster walls and pine floorboards, a narrow clerestory casting a strip of light on the shelves, soft diffuse morning daylight with a warm desk lamp, quiet and studious mood, fine film grain, no people, no readable text on the book spines.
```
Regra: sem texto nas lombadas (a AI inventa letras); a escada fica no mesmo sítio nas 3 câmaras.

**6. Entrega:** 3 finais em "#088 - Cliente imaginario 9 tradutor / final". Para reel: câmara B, 5 s, a faixa de luz a descer devagar pelas estantes (Seedance), som de folhear de páginas.

**Legenda**
- EN: "Daily Study #088 · Imaginary client #9: the translator. A house that is mostly shelves, one big window and a strip of morning light."
- PT: "Daily Study #088 · Cliente imaginário #9: o tradutor. Uma casa que é quase só estantes, uma janela grande e uma faixa de luz da manhã."

---

## #089 · Casas de Portugal #13: Trás-os-Montes, a casa de granito com balcão de madeira (sábado, 29 mai)

**Ideia:** décima terceira casa de Portugal: uma casa transmontana de granito com escada exterior de pedra e balcão de madeira corrido no piso de cima. Em baixo a loja (adega e animais), em cima a habitação. Luz fria de fim de outono, fumo na chaminé.

**1. Modelo 3D (25 min)**
- Volume de 7 × 6 m, 2 pisos, paredes em blocos de granito cinzento (bump forte), telhado de 2 águas em telha de barro envelhecida com chaminé alta.
- Escada exterior de pedra encostada à fachada até ao balcão; balcão (varanda) de madeira escurecida com guarda de prumos torneados; porta de dois batentes em baixo.
- Terreiro de pedra, um muro baixo, um carro de bois simples (blocos) encostado, duas árvores nuas ao fundo e colina com giestas.

**2. Câmaras (3), 4:5**
- A: 35 mm, a casa de frente-esquina com a escada e o balcão.
- B: 50 mm, o balcão de madeira e a chaminé, em ligeira contrapicada.
- C: 85 mm, o granito e a madeira da escada em detalhe, terreiro desfocado.

**3. Luz:** fim de tarde de outono, sol baixo e frio (4800 K) a bater de lado no granito, céu azul-acinzentado com nuvens finas; um fio de fumo da chaminé.

**4. Render base:** Render 1600 px; granito com líquen subtil, madeira queimada e rachada, telha irregular. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic photograph, same house, same stairs and camera as the reference image. A traditional Trás-os-Montes granite house, two storeys, rough grey granite walls with subtle lichen, an exterior stone staircase leading to a long weathered dark timber balcony with turned balusters, a tall chimney with a thin thread of smoke, aged terracotta roof tiles, a stone yard with a low wall and an old wooden ox cart, bare trees and broom-covered hills behind, low cold late-autumn sun raking across the stone, grey-blue sky, fine film grain, no people, no text.
```
Regra: número de degraus e prumos do balcão igual nas 3 câmaras; sem mais casas no fundo.

**6. Entrega:** 3 finais em "#089 - Casas de Portugal 13 Tras-os-Montes / final". Para reel: câmara A, 6 s, o fumo a subir e a luz a escurecer (Seedance), som de vento e sinos ao longe.

**Legenda**
- EN: "Daily Study #089 · Houses of Portugal #13: Trás-os-Montes. Granite below, timber balcony above, a thread of smoke saying someone is home."
- PT: "Daily Study #089 · Casas de Portugal #13: Trás-os-Montes. Granito em baixo, balcão de madeira em cima e um fio de fumo a dizer que está alguém em casa."

---

## #090 · Abecedário arquitetónico #9: I de Impluvium (terça, 1 jun)

**Ideia:** nona letra: I de Impluvium, o tanque no centro do átrio que recolhe a água da chuva por uma abertura no teto. Pátio interior coberto com um buraco de céu, tanque raso de pedra e a luz a refletir-se no teto. Imagem simétrica, calma, quase de templo.

**1. Modelo 3D (20 min)**
- Átrio de 8 × 8 m, colunas simples nos quatro cantos, telhado inclinado para dentro com abertura (compluvium) de 3 × 3 m; paredes em estuque quente.
- Tanque raso de pedra (3 × 3 m, 30 cm de fundo) sob a abertura, água plana; pavimento em lajes claras; uma planta grande num vaso num canto.
- Duas portas escuras em arco na parede de fundo, um banco de pedra.

**2. Câmaras (3), 4:5**
- A: 24 mm, do canto, o átrio inteiro com a abertura e o tanque.
- B: 40 mm, à altura do olhar, o tanque com o reflexo do céu e das colunas.
- C: 85 mm, o beiral da abertura com gotas de chuva a cair (fundo desfocado).

**3. Luz:** dia nublado com sol a romper, um feixe quente (4500 K) a entrar pela abertura e a cair numa quina do tanque; resto do átrio em penumbra fria.

**4. Render base:** Render 1600 px; água com reflexo e pequenas ondas, pedra molhada junto ao tanque, estuque com micro-relevo. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural interior photograph, same atrium, same pool and camera as the reference image. A quiet covered courtyard with a square opening in the roof, a shallow stone impluvium pool beneath it reflecting the sky, four plain columns, warm plaster walls, pale stone floor, two dark arched doorways and a stone bench, a single beam of warm sunlight falling across one corner of the pool, cool shadow elsewhere, light rain drops falling through the opening, serene and symmetrical, fine film grain, no people, no text.
```
Regra: o tanque é quadrado e centrado; a abertura do teto tem sempre o mesmo tamanho nas 3 câmaras.

**6. Entrega:** 3 finais em "#090 - Abecedario 9 I de Impluvium / final". Para reel: câmara B, 6 s, a chuva a cair no tanque e círculos na água (Seedance), som de chuva e eco.

**Legenda**
- EN: "Daily Study #090 · Architectural alphabet #9: I for Impluvium. A hole in the roof and a pool beneath it: the house that collects the sky."
- PT: "Daily Study #090 · Abecedário arquitetónico #9: I de Impluvium. Um buraco no teto e um tanque por baixo: a casa que recolhe o céu."

---

## #091 · Produto ao sol duro: uns óculos de sol sobre um plinto de terracota (quinta, 3 jun)

**Ideia:** produto de verão num estilo gráfico: uns óculos de sol de armação fina sobre um plinto de terracota, com sombras duras e nítidas que fazem parte da composição. Imagem solar, de grande contraste, quase de cartaz.

**1. Modelo 3D (20 min)**
- Óculos de sol (modelo gratuito ou feito com splines: armação de acetato escuro redonda, lentes verde-garrafa, hastes finas dobradas).
- Dois plintos de terracota (cilindro baixo e bloco) e uma esfera de gesso como volumes de apoio; fundo: parede lisa em bege claro e chão do mesmo tom.
- Um ramo de oliveira pequeno num canto (só folhas, para a sombra).

**2. Câmaras (3), 4:5**
- A: 50 mm, de frente, óculos no plinto, sombra longa para a direita.
- B: 85 mm, três quartos, as lentes a refletir o céu.
- C: 100 mm, a dobradiça e a haste, fundo desfocado.

**3. Luz:** sol de meio da tarde (5600 K), duro e lateral (30° acima do horizonte), sombras muito definidas e alongadas; sem luz de preenchimento (ou muito fraca) para manter o contraste.

**4. Render base:** Render 1600 px; acetato brilhante com reflexo, lentes com leve tom verde e reflexo, terracota porosa e gesso mate. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic product photograph, same sunglasses, same plinths and camera as the reference image. Round dark tortoiseshell acetate sunglasses with bottle-green lenses resting on a terracotta plinth beside a plaster sphere, bright hard afternoon sun from the side casting long razor-sharp shadows on a warm beige wall and floor, the shadow of olive leaves falling across the wall, high contrast, graphic and summery, subtle reflection of sky in the lenses, fine film grain, no people, no text, no logos.
```
Regra: a sombra das folhas é do ramo do modelo, não inventar objetos; sem logótipos na haste.

**6. Entrega:** 3 finais em "#091 - Produto oculos de sol terracota / final". Para reel: câmara A, 5 s, a sombra a rodar devagar pela parede como um relógio de sol (edição ou Seedance), som de cigarras e brisa.

**Legenda**
- EN: "Daily Study #091 · Product in hard sun: sunglasses on terracotta. The shadow is half of the picture."
- PT: "Daily Study #091 · Produto ao sol duro: óculos de sol sobre terracota. A sombra é metade da imagem."

---

## #092 · Desafio de cor #9: roxo-berinjela (sábado, 5 jun)

**Ideia:** nono desafio de cor, e o mais ousado: o roxo-berinjela, quase preto, com reflexos avermelhados. Um bar ou sala de leitura íntima ao entardecer, onde o roxo muito escuro dá profundidade e calor, e o latão e o creme dão ponto de luz.

**1. Modelo 3D (25 min)**
- Sala de 4 × 6 m com paredes e teto pintados em roxo-berinjela fosco, rodapé alto em madeira escura, cortinas de veludo da mesma cor.
- Balcão curto em mármore creme com tampo fino, 3 bancos de latão com assento de couro, prateleira de vidro com garrafas e copos (blocos simples, sem rótulos).
- Candeeiro de parede em latão (2), tapete de lã creme, um sofá pequeno em veludo ocre.

**2. Câmaras (3), 4:5**
- A: 28 mm, a sala inteira em diagonal a partir da entrada.
- B: 50 mm, o balcão com os candeeiros de latão.
- C: 85 mm, o veludo e a parede roxa em detalhe com um candeeiro desfocado.

**3. Luz:** entardecer a passar pela janela (3800 K) fraca e rasante, quase tudo iluminado pelos dois candeeiros de parede quentes (2400 K); sombras profundas, brilho nos latões.

**4. Render base:** Render 1600 px; tinta fosca com leve brilho no rodapé, veludo com fresnel/fuzz, mármore creme polido, latão escovado. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same room, same bar and camera as the reference image. An intimate small bar-lounge with walls and ceiling painted a deep matte aubergine purple, velvet curtains in the same colour, a short cream marble counter with three brass stools, a glass shelf of unlabelled bottles and glasses, two warm brass wall lamps, a cream wool rug and a small ochre velvet sofa, low warm light at dusk with soft glints on the brass, deep soft shadows, moody and luxurious, fine film grain, no people, no readable text or labels.
```
Regra: o roxo não vira azul nem magenta (manter berinjela); só 3 bancos e 2 candeeiros em todas as câmaras; sem rótulos nas garrafas.

**5b. Paleta:** cinco cores tiradas da imagem final com o conta-gotas (berinjela, creme, latão, ocre, quase-preto) para o slide da paleta.

**6. Entrega:** 3 finais em "#092 - Desafio de cor 9 roxo-beringela / final". Para o carrossel: slide da paleta com `scripts/make_palette.py`. Para reel: câmara B, 5 s, o brilho dos candeeiros a pulsar muito devagar (Seedance), som de jazz baixo e gelo num copo.

**Legenda**
- EN: "Daily Study #092 · Colour challenge #9: aubergine. Nearly black, never flat: the brass does the shouting."
- PT: "Daily Study #092 · Desafio de cor #9: berinjela. Quase preto, nunca chapado: o latão é que fala alto."

---

## #093 · Brief de concurso #5: um pavilhão de banhos na praia fluvial (terça, 8 jun)

**Ideia:** quinto brief de concurso imaginário: um pavilhão de apoio a uma praia fluvial, com balneários, um bar e um miradouro sobre a água. Madeira clara e cobertura inclinada, em cima de uma plataforma de pedra, com o rio calmo e as montanhas ao fundo. Imagem de verão, limpa e convidativa.

**1. Modelo 3D (25 min)**
- Plataforma de pedra clara de 18 × 6 m ao nível da margem; sobre ela uma estrutura leve em madeira: 3 módulos fechados (balneários e arrumos) e um módulo aberto (bar) com balcão.
- Cobertura única inclinada em chapa metálica cinza-claro, com beiral a avançar 1,5 m sobre uma esplanada e um deck em madeira que desce em degraus até à água.
- Rio: plano de água com leve ondulação; margem de seixos, 4 espreguiçadeiras de madeira, 6 árvores (salgueiros) em blocos simples, colina ao fundo.

**2. Câmaras (3), 4:5**
- A: 28 mm, da margem oposta, o pavilhão inteiro com a água em primeiro plano.
- B: 40 mm, a esplanada coberta e o bar de frente.
- C: 85 mm, o deck a descer para a água com as espreguiçadeiras.

**3. Luz:** início da tarde de verão, sol alto e suave (5600 K), ligeira névoa de calor na colina, céu azul-claro; reflexos na água.

**4. Render base:** Render 1600 px; madeira clara com veio, chapa mate, pedra com juntas, água com reflexo e transparência. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same pavilion, same riverbank and camera as the reference image. A contemporary river-beach pavilion with a long pale stone platform, light timber modules and an open bar under a single sloping pale-grey metal roof with a deep overhang, a timber deck stepping down to the calm water, four wooden sun loungers, willow trees along a pebble bank, soft green hills behind, bright high early-afternoon summer sun, clear blue sky and gentle reflections on the water, clean and inviting, fine film grain, no people, no readable text.
```
Regra: 3 módulos fechados e 1 aberto, 4 espreguiçadeiras, em todas as câmaras; sem pessoas nem barcos extra.

**6. Entrega:** 3 finais em "#093 - Brief concurso 5 pavilhao praia fluvial / final". Para reel: câmara A, 6 s, a água a cintilar e as folhas dos salgueiros a mexer (Seedance), som de rio, cigarras e crianças ao longe muito baixo.

**Legenda**
- EN: "Daily Study #093 · Competition brief #5: a river-beach pavilion. One long roof, a few timber boxes and a deck that walks down to the water."
- PT: "Daily Study #093 · Brief de concurso #5: um pavilhão para a praia fluvial. Um telhado comprido, umas caixas de madeira e um deck que desce até à água."

---

## #094 · Casa para um cliente imaginário #10: a violoncelista (quinta, 10 jun)

**Ideia:** décimo cliente imaginário: uma violoncelista que ensaia em casa e precisa de uma sala de música com acústica calma. Casa baixa de um piso, paredes grossas, uma grande sala de ensaio com teto em madeira e um pátio com uma oliveira. Imagem silenciosa, de luz lateral e madeira.

**1. Modelo 3D (25 min)**
- Casa térrea em L de 14 × 9 m, paredes rebocadas branco-quente, telhado de uma água. Sala de ensaio de 6 × 5 m com pé-direito de 3,8 m, teto com ripado de carvalho e janela alta e comprida virada a norte.
- Pátio fechado com uma oliveira (bloco simples), banco de pedra e piso de terra batida clara.
- Mobiliário mínimo: uma cadeira de madeira, uma estante de partituras (sem texto), um violoncelo em caixa simples encostado à parede, um tapete grande de lã.

**2. Câmaras (3), 4:5**
- A: 24 mm, a sala de ensaio de um canto, ripado do teto a fugir.
- B: 50 mm, a cadeira e o violoncelo sob a luz da janela alta.
- C: 35 mm, do pátio para a sala através da porta de vidro aberta.

**3. Luz:** manhã, luz fria e suave de norte (6000 K) a entrar pela janela alta e a riscar a parede; pátio com sol lateral baixo e sombra da oliveira.

**4. Render base:** Render 1600 px; reboco com grão, carvalho claro com veio, terra batida, lã com fuzz curto. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural interior photograph, same house, same rehearsal room and camera as the reference image. A calm single-storey home for a cellist: thick whitewashed walls, a rehearsal room with an oak slatted ceiling, one long high north window throwing a soft band of light across the wall, a single wooden chair, a music stand, a cello resting against the wall and a large undyed wool rug, a quiet courtyard with an olive tree and a stone bench seen through an open glass door, soft cool morning light, serene and acoustic, fine film grain, no people, no readable text or sheet music.
```
Regra: um só violoncelo, uma só cadeira, uma só estante em todas as câmaras; a estante e as partituras sem notas legíveis (a AI inventa); janela alta sempre do mesmo lado.

**6. Entrega:** 3 finais em "#094 - Cliente imaginario 10 violoncelista / final". Para reel: câmara A, 6 s, a faixa de luz a deslizar muito devagar pela parede (Seedance), som de uma nota longa de violoncelo a esvanecer.

**Legenda**
- EN: "Daily Study #094 · Imaginary client #10: a cellist. A tall quiet room, one band of north light and nothing else to listen to."
- PT: "Daily Study #094 · Cliente imaginário #10: a violoncelista. Uma sala alta e calada, uma faixa de luz norte e mais nada para ouvir."

---

## #095 · Casas de Portugal #14: Carrasqueira, as cabanas de palafitas no estuário do Sado (sábado, 12 jun)

**Ideia:** décima quarta 'Casas de Portugal': o cais palafítico da Carrasqueira, no estuário do Sado. Um cais de madeira sobre estacas com pequenas cabanas de colmo e tábua, barcos de pesca encostados e o arrozal ao longe. Imagem de fim de tarde, de cor baixa e água calma.

**1. Modelo 3D (25 min)**
- Cais de madeira de 24 m sobre estacas finas, cerca de 1,2 m acima de uma lama/água plana; 5 cabanas pequenas (2,5 × 3 m) em tábua desgastada e cobertura de colmo, cada uma com uma porta e uma janelinha.
- Escada de madeira de acesso à margem, redes penduradas, 3 barcos de pesca de fundo chato (blocos simples), caixas de madeira empilhadas.
- Fundo: junco, arrozal verde-claro e uma linha de pinheiros mansos.

**2. Câmaras (3), 4:5**
- A: 28 mm, o cais a fugir em perspetiva com as cabanas.
- B: 50 mm, duas cabanas e um barco, com o reflexo.
- C: 85 mm, as estacas e a madeira desgastada à altura da água.

**3. Luz:** fim de tarde, sol baixo e dourado (3800 K), céu pastel e água como espelho; ligeira névoa no arrozal.

**4. Render base:** Render 1600 px; madeira cinzenta-prateada gasta, colmo seco, água com reflexo nítido, lama húmida com brilho. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic documentary photograph, same wooden pier, same huts and camera as the reference image. The palafitte fishing pier of Carrasqueira on the Sado estuary in Portugal: a long weathered timber walkway on thin stilts, five small huts of silver-grey planks with thatched roofs, nets drying, three flat-bottomed fishing boats moored, wooden crates, reeds and pale green rice fields behind, low golden late-afternoon light, pastel sky and a perfectly still mirror-like water, fine film grain, no people, no readable text.
```
Regra: 5 cabanas e 3 barcos em todas as câmaras; reflexo sempre coerente com a água calma; sem pessoas nem nomes nos barcos.

**6. Entrega:** 3 finais em "#095 - Casas de Portugal 14 Carrasqueira / final". Para reel: câmara B, 6 s, o reflexo a tremer ao de leve e a névoa a mexer (Seedance), som de água a bater nas estacas e de gaivotas.

**Legenda**
- EN: "Daily Study #095 · Houses of Portugal #14: Carrasqueira. A pier that stands on pencils and still holds a whole village of boats."
- PT: "Daily Study #095 · Casas de Portugal #14: Carrasqueira. Um cais que se aguenta em lápis e ainda segura uma aldeia inteira de barcos."

---

## #096 · Abecedário arquitetónico #10: J de Jardim de inverno (terça, 15 jun)

**Ideia:** décima letra do abecedário: J de Jardim de inverno. Uma estufa de vidro e aço fino encostada à casa, com plantas grandes, piso de ladrilho e uma cadeira de verga. Imagem luminosa, verde e húmida, com a luz difusa de um dia nublado.

**1. Modelo 3D (25 min)**
- Volume de vidro de 5 × 3,5 m encostado a uma parede de pedra, estrutura de aço preto fino em águas, porta de duas folhas.
- Interior: ladrilho hexagonal claro, bancada de pedra com 8 vasos, uma palmeira e uma árvore de folha grande (blocos simples), uma cadeira de verga e uma mesinha, uma cortina de linho recolhida.
- Exterior: gravilha e um muro baixo.

**2. Câmaras (3), 4:5**
- A: 24 mm, a estufa de fora, encostada à parede de pedra.
- B: 35 mm, o interior de frente, plantas e a cadeira.
- C: 85 mm, o pormenor do aço, do vidro com condensação e das folhas.

**3. Luz:** dia de céu encoberto, luz muito difusa e fresca (6500 K) a atravessar o vidro, sem sombras duras; ligeira condensação no vidro.

**4. Render base:** Render 1600 px; vidro com reflexos suaves e leve rugosidade (condensação), aço preto mate, ladrilho com juntas, folhas com translucidez. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same conservatory, same stone wall and camera as the reference image. A winter garden: a slim black-steel glass conservatory leaning against an old stone wall, light hexagonal tile floor, a stone potting bench with eight pots, a tall palm and a large-leaf tree, a wicker chair and a small table, linen curtain gathered to one side, soft diffused overcast light with light condensation on the glass, lush and quiet, fine film grain, no people, no readable text.
```
Regra: 8 vasos, uma palmeira, uma cadeira de verga em todas as câmaras; folhas nunca a tapar a estrutura de aço inteira; sem pessoas.

**6. Entrega:** 3 finais em "#096 - Abecedario 10 J de Jardim de inverno / final". Para reel: câmara B, 5 s, a condensação a escorrer devagar e as folhas a mexer (Seedance), som de chuva leve no vidro.

**Legenda**
- EN: "Daily Study #096 · Architectural alphabet #10: J is for Jardim de inverno (winter garden). Glass, thin steel and a rainy-day green."
- PT: "Daily Study #096 · Abecedário arquitetónico #10: J de Jardim de inverno. Vidro, aço fino e um verde de dia de chuva."

---

## #097 · Produto sob a luz de uma janela: um perfumador de vidro âmbar (quinta, 17 jun)

**Ideia:** produto elegante e simples: um frasco de vidro âmbar com tampa de madeira, sobre uma bancada de pedra rugosa, com a sombra da janela a desenhar-se na parede de cal. Imagem quente, tátil e com vidro de verdade.

**1. Modelo 3D (25 min)**
- Frasco de 9 cm de altura em vidro âmbar espesso, base larga e gargalo curto, tampa cilíndrica de carvalho (modelo simples ou do 3D Warehouse/Sketchfab CC com licença conferida, a registar).
- Bancada de pedra rugosa de 60 × 40 cm, parede de cal atrás; um ramo de alecrim seco ao lado.
- Uma janela com vidros em quatro divisões, só a sombra e a luz entram em cena.

**2. Câmaras (3), 4:5**
- A: 70 mm, o frasco centrado, a sombra da janela na parede.
- B: 100 mm, três quartos, a luz a atravessar o vidro âmbar.
- C: 135 mm, macro da tampa de carvalho e do bordo do vidro.

**3. Luz:** sol de manhã baixo e quente (3500 K) através de janela quadriculada, a riscar a bancada e a parede; o vidro âmbar a projetar uma mancha de luz laranja.

**4. Render base:** Render 1600 px; vidro com refração e espessura (IOR 1,5), carvalho com veio, pedra rugosa, cal com grão. Guardar a refração limpa (sem ruído). Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic product photograph, same amber glass bottle, same stone surface and camera as the reference image. A thick amber-glass perfume bottle with a turned oak stopper on a rough pale stone counter against a limewashed wall, a sprig of dried rosemary beside it, warm low morning sun through a four-pane window casting a gridded shadow and a glowing amber caustic on the stone, tactile, quiet and premium, shallow depth of field, fine film grain, no people, no readable text or labels.
```
Regra: o frasco sem rótulo nem texto (a AI inventa marcas); a mancha âmbar sempre do mesmo lado; mesmo ramo de alecrim nas 3 câmaras.

**6. Entrega:** 3 finais em "#097 - Produto frasco ambar janela / final". Para reel: câmara A, 5 s, a sombra da janela a deslizar devagar sobre o vidro (Seedance), som de um sino distante e de passos de gato muito baixo.

**Legenda**
- EN: "Daily Study #097 · Product study: an amber bottle in window light. The sun does the lighting, the glass does the talking."
- PT: "Daily Study #097 · Estudo de produto: um frasco âmbar à luz de uma janela. O sol faz a iluminação, o vidro fala por si."

---

## #098 · Desafio de cor #10: azul-petróleo (sábado, 19 jun)

**Ideia:** décimo desafio de cor: azul-petróleo. Uma sala de jantar pequena e densa, com as paredes e a marcenaria nessa cor, uma mesa de madeira clara e luz quente de um candeeiro. Imagem de contraste e de profundidade.

**1. Modelo 3D (25 min)**
- Sala de 4,5 × 5 m com as paredes, o rodapé e uma estante embutida pintados azul-petróleo mate; mesa de carvalho claro para 4, quatro cadeiras de madeira escura, um aparador baixo em carvalho e um grande espelho redondo com moldura fina.
- Candeeiro pendente de latão e vidro opala sobre a mesa; cortina de linho cru; piso em madeira clara.
- Pormenores: uma jarra de vidro com ramos secos, três livros no aparador (sem texto).

**2. Câmaras (3), 4:5**
- A: 24 mm, a sala de um canto, a mesa e a estante.
- B: 50 mm, a mesa com o candeeiro pendente.
- C: 40 mm, o aparador e o espelho redondo.

**3. Luz:** final de tarde, luz de janela fria e baixa (5000 K) misturada com o candeeiro quente (2700 K); o petróleo a ficar profundo e a madeira clara a acender.

**4. Render base:** Render 1600 px; tinta mate com ligeiro brilho no rodapé, carvalho com veio, latão escovado, opala difusa, espelho com reflexo da sala. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic interior photograph, same dining room, same table and camera as the reference image. A small dense dining room with walls, skirting and built-in shelves in a deep matte petrol blue, a light oak table with four dark wooden chairs, a low oak sideboard, a large round mirror with a thin frame, a brass and opal glass pendant lamp glowing warm over the table, raw linen curtain, light timber floor, a glass jar of dried branches and three plain books, late-afternoon cool window light mixed with the warm lamp, rich and calm, fine film grain, no people, no readable text.
```
Regra: o azul-petróleo não vira azul-marinho nem verde; 4 cadeiras, 1 espelho, 1 candeeiro em todas as câmaras; livros sem título.

**6. Entrega:** 3 finais em "#098 - Desafio de cor 10 azul-petroleo / final". Para o carrossel: slide da paleta com `scripts/make_palette.py` (petróleo, carvalho, latão, linho, quase-preto). Para reel: câmara B, 5 s, a luz do candeeiro a pulsar quase impercetível (Seedance), som de talheres e conversa baixa ao longe.

**Legenda**
- EN: "Daily Study #098 · Colour challenge #10: petrol blue. When the walls are this dark, the lamp becomes the room."
- PT: "Daily Study #098 · Desafio de cor #10: azul-petróleo. Quando as paredes são tão escuras, o candeeiro passa a ser a sala."

---

## #099 · O meu bairro #5: a papelaria da rua, à hora da chuva (terça, 22 jun)

**Ideia:** quinto 'O meu bairro': uma papelaria antiga numa rua molhada, com montra cheia de cadernos e lápis (sem texto legível), toldo, calçada com reflexos e um candeeiro aceso. Cena de refúgio, de fim de tarde e chuva fina.

**1. Modelo 3D (25 min)**
- Prédio de 3 pisos com papelaria no rés-do-chão: montra comprida com prateleiras de madeira, porta de vidro com puxador de latão, toldo bordô, placa em branco.
- Rua: calçada portuguesa molhada, passeio com banco, um candeeiro de rua, um guarda-chuva pendurado numa grade, um poste de sinalização sem texto.
- Interior: balcão, estantes com caixas e cadernos (blocos simples), lâmpada pendente quente.

**2. Câmaras (3), 4:5**
- A: 28 mm, a fachada inteira em ligeira diagonal.
- B: 50 mm, a montra com os cadernos e o toldo.
- C: 85 mm, os reflexos da montra e do candeeiro na calçada molhada.

**3. Luz:** fim de tarde chuvoso, céu cinzento-azulado (7000 K), chuva muito fina; interior quente (2700 K) a sair pela montra e a refletir-se na calçada.

**4. Render base:** Render 1600 px; calçada molhada com brilho forte e reflexos nítidos, vidro com gotas, toldo em tecido, madeira gasta. Guardar "0 - clay", "0 - mask id" e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic street photograph, same building, same stationery shop and camera as the reference image. An old neighbourhood stationery shop at a rainy dusk, a long shop window glowing warm and filled with notebooks and pencils, a burgundy awning with a blank sign, a brass door handle, wet Portuguese cobblestones reflecting the lit window and a street lamp, a bench, an umbrella hanging on a railing, fine rain, blue-grey sky, cosy and nostalgic, fine film grain, no people, no readable text.
```
Regra: sem texto na placa, nos cadernos ou no poste (a AI inventa); reflexos coerentes entre câmaras; mesmo guarda-chuva e mesmo banco.

**6. Entrega:** 3 finais em "#099 - O meu bairro 5 papelaria / final". Para reel: câmara C, 6 s, a chuva fina e os reflexos a tremer na calçada (Seedance), som de chuva, passos longe e um sino de porta.

**Legenda**
- EN: "Daily Study #099 · My neighbourhood #5: the stationery shop in the rain. The shop window is the only warm page on the street."
- PT: "Daily Study #099 · O meu bairro #5: a papelaria à hora da chuva. A montra é a única página quente da rua."

---

## #100 · Casa para um cliente imaginário #11: o carpinteiro de barcos (quinta, 24 jun)

**Ideia:** décimo primeiro cliente imaginário: um carpinteiro de barcos que vive junto ao rio e precisa de casa e oficina sob o mesmo teto. Edifício comprido de madeira e tijolo, oficina aberta de um lado, habitação do outro, e um casco de barco em construção ao centro. Imagem de matéria: madeira, pó de serra, luz rasante.

**1. Modelo 3D (25 min)**
- Volume comprido de 16 × 7 m, empena de telhado de duas águas em chapa lacada escura; metade nascente em tijolo burro (habitação), metade poente em ripas de pinho (oficina) com portão de correr de 4 m.
- Dentro da oficina: um casco de barco de madeira em cavaletes (bloco simples, 5 m), uma bancada, ferramentas penduradas na parede (sem pormenor).
- Exterior: cais de tábuas até ao rio, um barco pequeno amarrado, caniço na margem.

**2. Câmaras (3), 4:5**
- A: 24 mm, da margem, o edifício comprido com o cais em primeiro plano.
- B: 35 mm, de dentro da oficina para o portão aberto, o casco em silhueta.
- C: 70 mm, pormenor da bancada, serradura e uma plaina sobre a madeira.

**3. Luz:** fim de tarde, sol rasante de poente através do portão aberto a riscar o chão de serradura; rio a refletir o céu em dourado.

**4. Render base:** 1600 px. Pinho com veio e variação de cor, tijolo burro, chapa mate, água com reflexo ligeiro. Guardar "0 - clay", "0 - mask id" (madeira / tijolo / chapa / água) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same building, same geometry and camera as the reference image. A long riverside workshop-house for a boat builder: one half in exposed brick (the home), the other half clad in weathered pine slats with a large sliding door (the workshop), dark matte metal gable roof, a half-built wooden boat hull on trestles inside, sawdust on the floor, tools hanging on the wall, a timber jetty reaching the calm river with a small moored boat, warm low evening sun raking through the open door, honest and handmade, fine film grain, no people, no readable text.
```
Regra: o casco tem sempre o mesmo tamanho e o mesmo lado virado para a porta; uma só bancada; ferramentas sem forma reconhecível específica (a AI multiplica-as).

**6. Entrega:** 3 finais em "#100 - Cliente imaginario 11 carpinteiro de barcos / final". Para reel: câmara B, 6 s, pó de serra a flutuar na faixa de sol (Seedance), som de plaina na madeira e água a bater no cais.

**Legenda**
- EN: "Daily Study #100 · Imaginary client #11: a boat builder. A workshop that opens onto the river, and a home that smells of pine."
- PT: "Daily Study #100 · Cliente imaginário #11: o carpinteiro de barcos. Uma oficina que abre para o rio e uma casa que cheira a pinho."

---

## #101 · Casas de Portugal #15: Monsanto, a casa entre penedos (sábado, 26 jun)

**Ideia:** a aldeia de Monsanto, na Beira Baixa, onde as casas nascem entre blocos de granito gigantes: uma parede é rocha, o telhado encosta-se a ela. Estudo da relação entre construção e pedra, sem copiar nenhuma casa concreta.

**1. Modelo 3D (25 min)**
- Dois penedos de granito arredondados (esculpe com displacement ou usa blocos deformados) de 4 e 5 m, com um vão de 2,5 m entre eles.
- Casa de pedra de 5 × 4 m encaixada no vão: uma parede lateral é a própria rocha; as outras em granito aparelhado irregular, telhado de uma água em telha de canudo, porta de madeira baixa e uma janela pequena com grade.
- Calçada de granito a subir em degraus, um vaso com sardinheira, uma videira a trepar.

**2. Câmaras (3), 4:5**
- A: 28 mm, de baixo da rua, a casa entalada entre os dois penedos.
- B: 50 mm, a porta e o encontro da parede com a rocha.
- C: 85 mm, textura: liquen sobre granito e a junção da telha com a pedra.

**3. Luz:** manhã limpa, sol lateral a 30°, sombras duras entre os blocos; céu azul profundo da Beira.

**4. Render base:** 1600 px. Granito com liquen amarelo e cinzento, telha antiga com musgo, madeira desbotada. Guardar "0 - clay", "0 - mask id" (rocha / parede / telha / madeira / vegetação) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same house, same boulders and camera as the reference image. A small stone house wedged between two enormous rounded granite boulders in a village of the Beira Baixa, Portugal, one wall of the house is the living rock itself, irregular dressed granite walls, a single-pitch old terracotta roof with moss, a low faded wooden door and one small barred window, yellow and grey lichen on the stone, a stepped granite cobbled lane, a geranium pot and a vine, clear morning sun from the side with crisp shadows, deep blue sky, timeless and sturdy, fine film grain, no people, no text.
```
Regra: os dois penedos têm de manter a forma e a posição em todas as câmaras (são a assinatura); a junção da parede com a rocha tem de ficar pensada, não colada.

**6. Entrega:** 3 finais em "#101 - Casas de Portugal 15 Monsanto / final". Para reel: câmara A, 5 s, nuvens muito altas a passar sobre os penedos (Seedance), som de vento e um sino distante.

**Legenda**
- EN: "Daily Study #101 · Houses of Portugal #15: Monsanto. Where the wall is the mountain and the roof leans on a boulder."
- PT: "Daily Study #101 · Casas de Portugal #15: Monsanto. Onde a parede é a montanha e o telhado se encosta a um penedo."

---

## #102 · Abecedário arquitetónico #11: K de Kiosk (terça, 29 jun)

**Ideia:** o quiosque de jardim: pequeno edifício autónomo em ferro e vidro, como os quiosques de refresco dos jardins portugueses do século XIX. Elemento de arquitetura minúscula, quase joia. Fundo verde, luz filtrada.

**1. Modelo 3D (20 min)**
- Planta octogonal de 4 m de diâmetro, base de pedra a 40 cm do chão, oito colunas finas de ferro fundido, cobertura em cúpula baixa de zinco com remate em pináculo.
- Painéis de vidro com caixilharia fina em quatro lados, balcão de madeira num deles, ornamento simples de lambrequim recortado no beiral.
- Envolvente: gravilha clara, três bancos de ferro, tílias e um canteiro de hortênsias.

**2. Câmaras (3), 4:5**
- A: 35 mm, frontal, o quiosque centrado contra o verde.
- B: 50 mm, de três quartos, o octógono e a cúpula.
- C: 85 mm, pormenor do lambrequim e da coluna com o jardim desfocado.

**3. Luz:** fim de manhã, sol a atravessar as folhas das tílias com manchas de luz no quiosque e na gravilha.

**4. Render base:** 1600 px. Ferro verde-escuro com patina leve, zinco mate, madeira pintada de creme, vidro limpo com reflexo suave. Guardar "0 - clay", "0 - mask id" (ferro / zinco / vidro / madeira / vegetação) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural photograph, same pavilion, same geometry and camera as the reference image. A small octagonal 19th-century garden kiosk with slender dark-green cast-iron columns, a low zinc dome with a finial, glazed panels with thin frames, a cream-painted timber counter, delicate cut-out valance under the eaves, pale gravel, three iron benches, linden trees and a bed of hydrangeas, dappled late-morning light filtering through the leaves, intimate and precious like a jewel box, fine film grain, no people, no text, no signs.
```
Regra: oito lados e oito colunas em todas as câmaras (a AI perde a conta); sem letreiros nem preços no balcão.

**6. Entrega:** 3 finais em "#102 - Abecedario 11 K de Kiosk / final". Para reel: câmara B, 5 s, manchas de luz a mexer sobre o zinco e a gravilha (Seedance), som de folhas e pardais.

**Legenda**
- EN: "Daily Study #102 · Architectural alphabet #11: K is for Kiosk. The smallest building in the park, and the one everyone remembers."
- PT: "Daily Study #102 · Abecedário arquitetónico #11: K de Kiosk. O edifício mais pequeno do jardim e aquele de que todos se lembram."

---

## #103 · Produto em betão ao fim da tarde: uma câmara analógica (quinta, 1 jul)

**Ideia:** produto sobre betão cofrado com luz quente e baixa, para mostrar textura e sombra comprida. Uma câmara analógica de corpo metálico e pele preta, com uma lente curta. Imagem de objeto, com tom de arquitetura.

**1. Modelo 3D (20 min)**
- Câmara de corpo rectangular (bloco com chanfros), pele texturada, topo metálico, lente cilíndrica com anéis; usa um modelo livre simples ou faz o bloco tu.
- Plano de betão cofrado de 80 × 50 cm com marcas de tábua e um degrau; um rolo de filme e uma folha seca de oliveira como escala.

**2. Câmaras (3), 4:5**
- A: 85 mm, de três quartos, a câmara toda com o degrau de betão por trás.
- B: 100 mm, macro, os anéis da lente e o topo metálico.
- C: 50 mm, rasante ao plano, a sombra comprida da câmara no betão.

**3. Luz:** sol de fim de tarde a 8° pela esquerda, quente (3500 K), sombra muito comprida; sombra do lado oposto levemente azulada.

**4. Render base:** 1600 px. Betão com poros e marcas de tábua, metal escovado, pele com micro-granulação. Guardar "0 - clay", "0 - mask id" (corpo / lente / metal / betão) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic product photograph, same object, same geometry and camera as the reference image. A vintage-style 35mm film camera with black textured leatherette, brushed metal top plate and a short lens with knurled rings, resting on board-marked cast concrete with a small step, a roll of film and a dry olive leaf beside it, low warm late-afternoon raking sun from the left, long soft shadows, subtle cool shadow fill, tactile and quiet, shallow depth of field, fine film grain, no readable text, no logos, no brand engraving.
```
Regra: sem gravação nem marca na câmara (a AI inventa logótipos); a mesma lente nas três; a sombra comprida tem de apontar para o mesmo lado.

**6. Entrega:** 3 finais em "#103 - Produto 4 camara analogica / final". Para reel: câmara C, 5 s, a sombra a crescer devagar no betão (Seedance), som de obturador a disparar uma vez no fim.

**Legenda**
- EN: "Daily Study #103 · Product study: an analogue camera on raw concrete. Low sun, long shadow, one frame left on the roll."
- PT: "Daily Study #103 · Estudo de produto: uma câmara analógica em betão bruto. Sol baixo, sombra comprida, uma fotografia por tirar no rolo."

---

## #104 · Desafio de cor #11: vinho-bordeaux (sábado, 3 jul)

**Ideia:** décimo primeiro desafio de cor: um interior em tons de vinho, madeira escura e luz quente, para um carrossel com paleta. Uma sala de provas de vinho pequena, com parede lacada bordeaux, adega à vista e balcão de nogueira.

**1. Modelo 3D (20 min)**
- Sala de 5 × 4 m: parede do fundo com lacado bordeaux profundo brilhante, rodapé e portas de nogueira, balcão corrido de nogueira com tampo de pedra escura, três bancos altos de couro.
- Adega envidraçada embutida numa parede lateral com garrafas deitadas (instâncias simples), três copos e uma garrafa no balcão; candeeiro pendente de latão.

**2. Câmaras (3), 4:5**
- A: 28 mm, da porta, a parede bordeaux inteira com o balcão.
- B: 50 mm, balcão com copos e a adega ao lado.
- C: 100 mm, o tampo de pedra com o reflexo da luz e o vinho no copo.

**3. Luz:** noite, só luz quente (2700 K) do candeeiro e da adega, parede lacada a refletir em degradé suave.

**4. Render base:** 1600 px. Lacado brilhante com reflexo difuso, nogueira escura com veio, couro com vinco, vidro da adega com reflexo ténue. Guardar "0 - clay", "0 - mask id" (parede / madeira / pedra / vidro / couro) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural interior photograph, same room, same geometry and camera as the reference image. A small intimate wine-tasting room with a deep glossy burgundy lacquered back wall, dark walnut joinery and counter with a dark stone top, three tall leather stools, a built-in glazed wine cellar with bottles lying on their sides, a brass pendant lamp, three glasses and one bottle on the counter, warm 2700K light only, rich reflections, sensual and calm, fine film grain, no people, no readable labels, no text.
```
Regra: o bordeaux tem de ser o MESMO nas três (conta-gotas, aproximadamente #5a1a2b); sem rótulos legíveis nas garrafas.

**6. Entrega:** 3 finais em "#104 - Desafio de cor 11 vinho-bordeaux / final" + 1 slide de paleta (faço-o eu a partir das tuas finais). Para reel: câmara C, 5 s, a luz a deslizar no tampo e o vinho a girar no copo (Seedance).

**Legenda**
- EN: "Daily Study #104 · Colour challenge #11: burgundy. A wall the colour of a good red, and nothing in the room to argue with it."
- PT: "Daily Study #104 · Desafio de cor #11: vinho-bordeaux. Uma parede da cor de um bom tinto e nada na sala que a contrarie."

---

## #105 · Brief de concurso #6: um refúgio de montanha na Serra da Estrela (terça, 6 jul)

**Ideia:** sexto "concurso imaginário": um refúgio para oito pessoas a 1800 m, em granito e madeira, pensado para o inverno: volume baixo, telhado coberto de neve e uma janela corrida virada ao vale. Imagem de concurso, pura e dramática.

**1. Modelo 3D (25 min)**
- Volume compacto de 10 × 6 m, base de granito aparelhado até 1,2 m, o resto em madeira de lariço escura; telhado de duas águas com pouca inclinação.
- Janela corrida de 5 m virada ao vale, alpendre lateral lenhado, chaminé de pedra.
- Terreno em encosta com pedras soltas e urze rasteira (displacement); neve em cima do telhado e nas pedras (camada branca); trilho marcado.

**2. Câmaras (3), 4:5**
- A: 24 mm, de baixo, o refúgio pequeno sobre a encosta com o vale ao fundo.
- B: 35 mm, do alpendre, a janela corrida com a luz quente de dentro.
- C: 70 mm, o canto granito/madeira com neve e a lenha.

**3. Luz:** hora azul ao fim do dia: céu azul profundo, luz quente das janelas, neve com reflexo frio; versão opcional ao amanhecer.

**4. Render base:** 1600 px. Granito escuro, lariço tratado mate, neve com subsurface leve. Guardar "0 - clay", "0 - mask id" (granito / madeira / neve / céu / janela) e "0 - render base".

**5. AI (Nano Banana, o mesmo prompt nas 3 câmaras)**
```
Photorealistic architectural competition image, same building, same geometry and camera as the reference image. A small mountain refuge in the Serra da Estrela, Portugal, with a granite base and dark larch timber walls, a low gabled roof covered in snow, a long horizontal window glowing warm from inside, a stone chimney with a thin plume of smoke, stacked firewood, windswept heather and boulders dusted with snow, a faint footpath, deep blue hour sky over a distant valley, quiet and powerful, fine film grain, no people, no text.
```
Regra: janela corrida do mesmo comprimento e do mesmo lado em todas as câmaras; a neve a cobrir igualmente; um só fumo, fino.

**6. Entrega:** 3 finais em "#105 - Concurso 6 Refugio de montanha / final". Para reel: câmara A, 6 s, fumo da chaminé e neve a cair muito de leve (Seedance), som de vento e lume a crepitar.

**Legenda**
- EN: "Daily Study #105 · Imaginary competition #6: a mountain refuge. A warm window, eight beds and a very long way down."
- PT: "Daily Study #105 · Concurso imaginário #6: um refúgio de montanha. Uma janela quente, oito camas e um vale muito lá em baixo."

---

Lembretes: briefing do dia seguinte enviado segunda, quarta e sexta à noite. Mais ideias no dossier e em docs/content-plan.yml, calendarizadas por mim (próximo lote #106–#111, 8–20 jul, até 5 jul).
