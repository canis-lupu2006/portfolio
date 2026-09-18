import sharp from 'sharp';
import { mkdir } from 'node:fs/promises';
import path from 'node:path';

const jobs = [
    { input: 'public/images/momo.jpg', output: 'public/images/momo.webp', width: 900, quality: 72 },
    { input: 'public/images/modeste.jpg', output: 'public/images/modeste.webp', width: 900, quality: 70 },
    { input: 'public/images/projects/jenkins-cicd.png', output: 'public/images/projects/jenkins-cicd.webp', width: 1400, quality: 70 },
    { input: 'public/images/projects/nba-analytics.png', output: 'public/images/projects/nba-analytics.webp', width: 1400, quality: 70 },
    { input: 'public/images/projects/nba.png', output: 'public/images/projects/nba.webp', width: 1400, quality: 70 },
    { input: 'public/images/projects/froid-du-centre.png', output: 'public/images/projects/froid-du-centre.webp', width: 800, quality: 72 },
    { input: 'public/images/projects/froid-logo.png', output: 'public/images/projects/froid-logo.webp', width: 800, quality: 72 },
];

for (const job of jobs) {
    await mkdir(path.dirname(job.output), { recursive: true });
    const info = await sharp(job.input)
        .rotate()
        .resize({ width: job.width, withoutEnlargement: true })
        .webp({ quality: job.quality, effort: 6 })
        .toFile(job.output);
    console.log(`${job.output} ${Math.round(info.size / 1024)} KB`);
}
