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

Lembretes: briefing do dia seguinte enviado segunda, quarta e sexta à noite. Mais 31 ideias no dossier, calendarizadas por mim.
